<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adress[]|\Cake\Collection\CollectionInterface $adresses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if($user['type'] === 'secretaireNC') : ?>

        <li><?= $this->Html->link(__('See patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('See assignments'), ['controller' => 'Assignments', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('See adresses'), ['controller' => 'Adresses', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('Profile'), ['controller' => 'Users', 'action' => 'view/' . $user['id']]) ?></li> 
        <li><?= $this->Html->link(__('Resend confirmation link'), ['controller' => 'Emails', 'action' => 'index', $user['uuid'], $user['email'], $user['id']]) ?></li> 

        <?php elseif($user['type'] === 'secretaire') : ?>
        
        <li><?= $this->Html->link(__('Patients management'), ['controller' => 'Patients', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li> 
        <li><?= $this->Html->link(__('Assignments management'), ['controller' => 'Assignments', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li> 
        <li><?= $this->Html->link(__('Adresses management'), ['controller' => 'Adresses', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New adress'), ['controller' => 'Adresses', 'action' => 'add']) ?></li> 
        <li><?= $this->Html->link(__('Files management'), ['controller' => 'Files', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New file'), ['controller' => 'Files', 'action' => 'add']) ?></li> 
        <li><?= $this->Html->link(__('Profile'), ['controller' => 'Users', 'action' => 'view/' . $user['id']]) ?></li> 
        
        <?php elseif($user['type'] === 'admin') : ?>
        
       
        <li><?= $this->Html->link(__('Users management'), ['controller' => 'Users', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Medical centers management'), ['controller' => 'MedicalCenters', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New Medical Center'), ['controller' => 'MedicalCenters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Departments management'), ['controller' => 'Departments', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Patients management'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Assignments management'), ['controller' => 'Assignments', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New assignment'), ['controller' => 'Assignments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Adresses management'), ['controller' => 'Adresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New adress'), ['controller' => 'Adresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Chambers management'), ['controller' => 'Chambers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New chamber'), ['controller' => 'Chambers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Levels management'), ['controller' => 'Levels', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New level'), ['controller' => 'Levels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Files management'), ['controller' => 'Files', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('New file'), ['controller' => 'Files', 'action' => 'add']) ?></li> 
        <li><?= $this->Html->link(__('Profile'), ['controller' => 'Users', 'action' => 'view/' . $user['id']]) ?></li> 
        <?php else : ?>
        
        <li><?= $this->Html->link(__('New account'), ['controller' => 'Users', 'action' => 'add']) ?></li> 
        <li><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?></li> 
        <li><?= $this->Html->link(__('See medical centers'), ['controller' => 'MedicalCenters', 'action' => 'index']) ?></li> 
        <li><?= $this->Html->link(__('See departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li> 
        <?php endif; ?>
    </ul>
</nav>
<div class="adresses index large-9 medium-8 columns content">
    
    <h4>Prénom et nom</h4>
    
    <p>William Sarrazin</p>
    
    <br />
    <br />
    <h4>Titre du cours</h4>
    420-267 MO Développer un site Web et une application pour Internet.<br />
    Automne 2018, Collège Montmorency
    
    <br />
    <br />
    
    <h4>Intérêt du site Web</h4>
    
    <p>
        Objectifs du site : <br />
        L'application sert à la gestion de base (puisqu'il s'agit d'un prototype) de centres médicaux.  On peut y faire la gestion des centres, c'est-à-dire
        qu'on peut gérer les patients, les affectations, les départements, les adresses, les centres, etc. Pour l'entreprise, elle sert à pouvoir entrer des 
        données importantes de façon rapide dans une base de données et d'utiliser ces données, par la suite, pour offrir des services aux patients.
         <br />
          <br />
        Public cible : <br />
        L'application à comme plus grand public cible les employés des centres médicaux.  Elle leur sert à accomplir surtout des tâches de gestion en rapport avec 
        les clients et leurs affectations.  Il est surtout utilisé par les secrétaires et les administrateurs.  Toutefois, il est également possible pour les visiteurs 
        d'accéder au site, mais ils ne pourront rien ajouter comme données et seulement voir des données qui ne sont pas privées.  L'application est quand même facile 
        d'utilisation, mais reste quand même un peu complexe puisqu'il s'agit aussi de traiter de la gestion d'un grand centre complexe.
    </p>
    
    <br />
    <br />
    
    <h4>Comptes pour les tests</h4>
    
    <p>
   
        Username : Sandrine Password : 1234 (Secrétaire confirmée)
        <br />
        Username : Admin Password : admin (Administrateur)
        
    </p>
    
    
    
    <br />
    <br />
    
    <h4>Lien vers Git Repository</h4>
    <a href="https://github.com/williamsarrazin018/web">Lien</a>
    
     <br />
    <br />
    <h4>Altérations au fonctionnement pour le TP2</h4>
    
    <p>
       Malgré beaucoup d'efforts, je n'ai pas réussi à faire fonctionner certaines des fonctionnalités complètement.
       Pour ce qui est des Tests, j'ai rencontré des problèmes avec phpUnit, je n'ai donc pas vraiment roulé les tests, mais le code est là.
       Par exemple, pour les tests de modèles, j'ai testé la méthode FindbyAdressId dans PatientsTableTest.  Et pour la faille XSS j'ai testé l'injection
       de script pour l'ajout d'une chambre dans ChambersTableTest.  Pour le controller, j'ai testé PatientsControllerTest.  Je n'ai donc pas pu non plus
       générer la page de coverage.
       <br />
       <br />
       Pour ce qui est du menu avec le twitterbootstrap dans routage admin, je n'ai pas réussi èa le faire s,afficher, mais le code est là.  Toutfois,
       j'ai utilisé bootstrap pour ajouter un menu déroulant dans le layout/default.ctp avec les actions des controlelrs principaux.
       <br />
       <br />
       Pour ce qui est de l'affichage en pdf, je réussi à faire changer l'url vers /adresses/view/numerodel'adresse.pdf, mais il semble y avoir un problème
       avec mon plugin cakePdf qui empêcherait le download.  Le code est donc là, mais ça ne va pas plus loin.
       <br />
       
    </p>
    
    
    <br />
    <br />
    
    <h4>Altérations au fonctionnement pour le TP3</h4>
    
    <p>    
       Malgré mes efforts, j'ai été incapable de faire fonctionner la fonction EDIT de mon interface monopage (levels).  Toutefois, mon code est là, mais je pense qu'il s'ahit d'une erreur que j,ai fait pendant l'implantation.
    </p>
    
    <br />
    <br />
    
    <h4>Étapes d'utilisation typique</h4>
    
    <p>
        POUR TP1 :
        <br />
        Le but de l'application est de créer des patients et diverses informations dans le but que créer des affectations dans le centre médical.
        Un visiteur peut voir les les différents centres médicaux et leurs différents départements seulement.  Tandis que les secrétaires peuvent
         ajouter de nouvelles informations dans le système (Patients, affectations, fichiers, adresses, etc.) tant que leur compte soit confirmé.  Elle peuvent aussi modifier
          et supprimer les informations qu'elles ont créées.  Si elle ne sont pas confirmées, elle auront les mêmes droits qu'un simple visiteur.  Les administrateurs, eux, ont tous les droits sur les informations.
         Donc, pour utiliser l'application, on commence par se créer un compte et le confirmer à partir d'un lien reçu par courriel.  Par la suite, en tant
          que secrétaire, on pourra ajouter des adresses, des patients, des fichiers, des nouvelles affectations, etc.  Même chose en tant qu'administrateur.
          Il nous est aussi possible, en tant que n'importe qui, de changer la langue d'affichage du site en Francais, Anglais ou Espagnol.
         <br />
        POUR TP2 :
        <br />
        Avant de commencer, Pour commencer, il faut se connecter à l'application.  Il est préférable de se connecter en tant qu'administrateur pour avoir accès à toutes les fonctionnalités
         (email: admin@admin.com, mot de passe: admin).  Pour tester l'interface monopage, il suffit d'aller dans le menu déroulant fait avec bootstrap en haut à gauche et cliquer
          sur Levels.  On arrive donc sur la page de gestion des Levels qui permet d'ajouter, modifier, supprimer et voir.  Pour tester les listes liées, il faut
          aller dans la gestion des Chambers et les listes liées sont à propos de Level et Chambers.  Pour l'autocomplétion, elle se fait quand on veut 
           modifier un département sur le champs département.  Pour tester l'interface Admin avec le préfixe, il suffit de cliquer dans la barre de menu en haut sur Interface
            Admin.  On a donc accès aux actions du controller Levels.  Pour le PDF, il suffirait de cliquer dans adresses/index sur (pdf).  On sera donc amener
            à /adresses/view/X.pdf.  Techniquement, cela devrait commencer un téléchargement avec le plugin cakePdf, mais il semble y avoir un problème avec mon plugin.
            <br />
        POUR TP3 :
        <br />
        Pour tester les listes liées, on peut se connecter en tant qu'Admin (Username : Admin, Password : admin), puis on va dans l'action add du controleur 
        des affectations (Assignments).  Les listes sont en rapport avec les levels.
         <br />
          <br />
          Pour tester l'interface monopage modifiées pour AngularJS, on va dans l'index du controleur des étages (Levels), soit, Levels Managment dans le menu. 
          À partir de cette page, on se connecte encore en tant qu'admin (User : Admin, Pwd : admin), puis on peut ajouter ou modifier par la suite les étages.
           <br />
            <br />
          Pour tester le Captcha et la modification du mot de passe, on reste dans l,interface monopage.  On commence par se connecter avec le bouton Login et les
           informations du compte Admin données précédement sans oublier de cocher la vérification Captcha.  Ensuite, pour modifier le mot de passe, on reclique sur le même bouton qui permet soit de se déconnecter ou de changer 
           le mot de passe.  On peut  donc entrer le nouveau mot de passe dans le champs texte et valider.
            <br />
             <br />
          Pour ce qui est de l'ajout de fichier en glissant l'images dans le index de Files, il suffit de se conencter avec les infos du compte Admin pour tester. 
          Puis, de glisser un image sur la page index.  L'image sera donc ajoutée dans l,index et dans la base de données de l'application.
        
    </p>
    
    
    
    <br />
    <br />
    <h4>Diagramme actuel</h4>
    
    <?php echo $this->Html->image('bd_actuelle.JPG', array('alt' => 'actuelle', 'border' => '0')); ?>
    
    <br />
    <br />
    <h4>Diagramme de base</h4>
    
    <?php echo $this->Html->image('bd_originale.gif', array('alt' => 'actuelle', 'border' => '0', 'data-src' => 'holder.js/100%x100')); ?>
    
    <br />
    <br />
    
    
</div>
