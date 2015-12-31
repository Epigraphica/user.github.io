<?php

namespace Chamilo\CmsBundle\DataFixtures\PHPCR;

use Chamilo\CmsBundle\Document\Page;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ODM\PHPCR\DocumentManager;
use Doctrine\ODM\PHPCR\Translation\LocaleChooser\LocaleChooser;

class LoadPageData implements FixtureInterface
{
    public function load(ObjectManager $dm)
    {
        if (!$dm instanceof DocumentManager) {
            $class = get_class($dm);
            throw new \RuntimeException(
                "Fixture requires a PHPCR ODM DocumentManager instance, instance of '$class' given."
            );
        }

        $parent = $dm->find(null, '/cms/pages');

        $localePreferences = array(
            'en' => array('es'),
            'es' => array('en'),
        );


        $dm->setLocaleChooserStrategy(
            new LocaleChooser($localePreferences, 'en')
        );

        $rootPage = new Page();
        $rootPage->setTitle('main');
        $rootPage->setParentDocument($parent);
        $dm->persist($rootPage);

        $page = new Page();
        $page->setTitle('Home');
        $page->setParentDocument($rootPage);
        $page->setContent(
            <<<HERE
            Welcome to the homepage of this really basic CMS.
HERE
        );

        $dm->persist($page);
        $dm->bindTranslation($page, 'en');

        $page->setTitle('Inicio');
        $page->setContent('Bienvenido!');
        $dm->bindTranslation($page, 'es');


        $page = new Page();
        $page->setTitle('About');
        $page->setParentDocument($rootPage);
        $page->setContent(
            <<<HERE
            This page explains what its all about.
HERE
        );
        $dm->persist($page);

        $dm->flush();
    }
}