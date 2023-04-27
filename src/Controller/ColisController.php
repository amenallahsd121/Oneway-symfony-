<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Dompdf\Options; 
use App\Entity\Colis;
use App\Form\ColisType;
use App\Form\PaiementType;
use App\Entity\Utilisateur;
use Endroid\QrCode\Encoding\Encoding;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Endroid\QrCode\Builder\BuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Builder\BuilderRegistryInterface;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCodeBundle\Response\QrCodeResponse;







class ColisController extends AbstractController
{


    private $entityManager;
    private $customQrCodeBuilder;
    
    public function __construct(EntityManagerInterface $entityManager, BuilderInterface $customQrCodeBuilder)
    {
        $this->entityManager = $entityManager;
        $this->customQrCodeBuilder = $customQrCodeBuilder;
    }
    



    
/////////////////////////////////////////////////     DISPLAY + PAGINATION    /////////////////////////////////////////////////////

    #[Route('/colis', name: 'app_colis')]
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Colis::class);
        $query = $repository->createQueryBuilder('c')
        ->orderBy('c.id_colis', 'DESC');
          
            
        $data = $paginator->paginate(
            $query, // Requête contenant les données à paginer (ici notre requête custom)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            3 // Nombre de résultats par page
        );
    
        return $this->render('colis/index.html.twig', [
            'list' => $data   
        ]);
    }
    

  



/////////////////////////////////////////////////     ADD    /////////////////////////////////////////////////////




    #[Route('/colis/add', name: 'add_colis')]
    public function addcolis(ManagerRegistry $doctrine,Request $req): Response {
      
        $em = $doctrine->getManager();
        $colis = new Colis();
        $form = $this->createForm(ColisType::class,$colis);
        $form->handleRequest($req);
        

        if($form->isSubmitted() && $form->isValid()) {
           
 
        $id=123;
        $utilisateur = $this->entityManager->getRepository(Utilisateur::class)->find($id);
        $colis->setUtilisateur($utilisateur);
        $this->entityManager->persist($colis);
        $this->entityManager->flush();

            $em->persist($colis);
            $em->flush();
            return $this->redirectToRoute('app_colis');
        }

        return $this->renderForm('colis/ajoutercolis.html.twig',['form'=>$form]);

}






/////////////////////////////////////////////////     UPDATE    /////////////////////////////////////////////////////



#[Route('/colis/update/{id}', name: 'update_colis')]
    public function update(Request $req, $id) {
      
      $colis = $this->getDoctrine()->getRepository(Colis::class)->find($id); 
      $form = $this->createForm(ColisType::class,$colis);
      $form->handleRequest($req);
    if($form->isSubmitted() && $form->isValid()) {
       
    $id=123;
    $utilisateur = $this->entityManager->getRepository(Utilisateur::class)->find($id);
    $colis->setUtilisateur($utilisateur);
    $this->entityManager->persist($colis);
    $this->entityManager->flush();

    
    

        $em = $this->getDoctrine()->getManager();
        $em->persist($colis);
        $em->flush();


    

        return $this->redirectToRoute('app_colis');
    }

    return $this->renderForm('colis/modifier.html.twig',[
        'form'=>$form]);

}




/////////////////////////////////////////////////     DELETE    /////////////////////////////////////////////////////


#[Route('/colis/delete/{id}', name: 'delete_colis')]
public function delete($id) {
 
 
   
    $data = $this->getDoctrine()->getRepository(Colis::class)->find($id); 

      $em = $this->getDoctrine()->getManager();
      $em->remove($data);
      $em->flush();



      return $this->redirectToRoute('app_colis');
  }



  


/////////////////////////////////////////////////     STRIPE    /////////////////////////////////////////////////////



  #[Route('/colis/payer', name: 'app_payer')]
    public function payer(Request $req): Response {
    {
        $form = $this->createForm(PaiementType::class);
        $form->handleRequest($req);
        

        if($form->isSubmitted() && $form->isValid()) {
           
      
            return $this->redirectToRoute('app_colis');
        }

        return $this->renderForm('colis/paiement.html.twig',['form'=>$form]);
    }
}








/////////////////////////////////////////////////     PDF    /////////////////////////////////////////////////////

   
#[Route('/colis/pdf/{id}', name: 'app_pdf')]
public function pdf($id): Response
{
    // Configure Dompdf according to your needs
    $pdfOptions = new Options();
    $pdfOptions->set('isRemoteEnabled', true);

    $colis = $this->getDoctrine()->getRepository(Colis::class)->find($id); 

    // Instantiate Dompdf with our options
    $dompdf = new Dompdf($pdfOptions);

  
 
    // Retrieve the HTML generated in our twig file
    $html = $this->renderView('colis/pdf.html.twig', [
        'colis' => [$colis]
    ]);


    // Load HTML to Dompdf
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
    $dompdf->setPaper('A4', 'landscape');

  
    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser (force download)
    $output = $dompdf->output();
    $response = new Response($output);
    $response->headers->set('Content-Type', 'application/pdf');
    $response->headers->set('Content-Disposition', 'attachment;filename=mypdf.pdf');
    $response->headers->set('Pragma', 'public');
    $response->headers->set('Cache-Control', 'max-age=0');

    return $response;
}








/////////////////////////////////////////////////     QR CODE    /////////////////////////////////////////////////////





#[Route('colis/qrcode/{id}', name: 'qrcode')]
public function qrcode(BuilderInterface $customQrCodeBuilder , $id ): Response
{
    $colis = $this->entityManager->getRepository(Colis::class)->find($id);
    $livraison = $colis->getLivraisons();
    $livraisonetat = $livraison ? $livraison->getEtat() : "Pas Encore Delivré";

    $qrCode = $this->customQrCodeBuilder
        ->size(400)
        ->margin(20)
        ->data('Votre Colis Est  : ' . $livraisonetat)
        ->build();

    return new QrCodeResponse($qrCode);
}



}





   
   












    




