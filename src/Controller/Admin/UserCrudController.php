<?php
namespace App\Controller\Admin;

use App\Entity\User;

use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\HiddenField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            // FormField::addPanel('Identification'),
            //FormField::addTab('First Tab'),
            IdField::new('id')->onlyOnIndex()->setColumns(6),
            TextField::new('username', 'Nom Utilisateur')->setColumns(6),
            EmailField::new('email', 'E-Mail')->setColumns(6),
            TextField::new('password', 'Mot de Passe')->setFormType(PasswordType::class)->onlyWhenCreating()->setColumns(6),
            TextEditorField::new('password', 'Passe')->onlyOnIndex()->setColumns(6),
            ChoiceField::new('roles', 'Roles')->setChoices(['Admin' => 'ROLE_ADMIN', 'Professeur' => 'ROLE_PROF', 'Etudiant'=>'ROLE_ETUDIANT', 'Chef de filière'=>"ROLE_CHEF", "APOGE"=>"ROLE_APOGE"])->allowMultipleChoices()->setColumns(6),
            ChoiceField::new('locale', 'Langue')->setChoices(['🇫🇷 Français' => 'fr_FR', '🇬🇧 English' => 'en_EN', '🇪🇦 Español' => 'es_ES', '🇲🇦 العربية' => 'ar_AR'])->setColumns(6),
            BooleanField::new('is_verified', 'Verifié')->setColumns(6),
            #ImageField::new('imageFilename', 'Photos')->setFormType(FileUploadType::class)->setUploadDir('public/uploads')->setColumns(6),

        ];
    }

  
}
