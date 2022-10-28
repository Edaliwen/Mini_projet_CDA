<?php
// src/Controller/LuckyController.php
namespace App\Controller;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
// use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class UserController extends AbstractController
{
     private $requestStack;

     public function __construct(RequestStack $requestStack)
     {
         $this->requestStack = $requestStack;
     }
    public function inscription(Request $request, ManagerRegistry $doctrine): Response
    {
     if($request->request->get('_password')!= null && $request->request->get('_mail')!=null ){
          $nom = $request->request->get('_nom');
          $prenom = $request->request->get('_prenom');
          $mail = $request->request->get('_mail');
          $password = $request->request->get('_password');
          $tel = $request->request->get('_tel');
          $entityManager = $doctrine->getManager();
            $user = new User();
            $user ->setName($nom);
            $user ->setFirstname($prenom);
            $user ->setEmail($mail);
            $user ->setPassword($password);
            $user ->setPhone($tel);
            $entityManager->persist($user);
            $entityManager->flush();
     }
      return $this->render('user/inscription.html.twig');
    }

    public function connexion(Request $request, ManagerRegistry $doctrine): Response
    {
     $pass = $request->request->get('_pwd');
     $mail = $request->request->get('_email');
     $user = null;
     if($pass != null && $mail!=null )
     {
         
          $product = $doctrine->getRepository(User::class)->find(1);
          $repository = $doctrine->getRepository(User::class);
          $u = $repository->findOneBy([
               'password' => $pass,
               'email' => $mail,
           ]);
           if($u != null){
               $user = $u->getName();
               $session = $this->requestStack->getSession();
               $session->set('usersession', $user);
            // gets an attribute by name
           $foo = $session->get('foo');

        // the second argument is the value returned when the attribute doesn't exist
        $filters = $session->get('filters', []);
              
               return $this->redirectToRoute('app_home');
           }
     }
       return $this->render('user/connexion.html.twig');
       
    }
}
?>