<?php
declare(strict_types=1);

namespace Savosik\OzonBundle;
use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;


class OzonBundle extends AbstractPimcoreBundle {

    protected function getComposerPackageName(): string
    {
        // getVersion() will use this name to read the version from
        // PackageVersions and return a normalized value
        return 'savosik/pimcore-ext';
    }

    public function getVersion()
    {
        return '1.0';
    }

    public function getDescription()
    {
        return 'Adds console commands for import Ozon categories and attributes';
    }

}