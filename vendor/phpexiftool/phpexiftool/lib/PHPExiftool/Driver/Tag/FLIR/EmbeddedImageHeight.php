<?php

/*
 * This file is part of PHPExifTool.
 *
 * (c) 2012 Romain Neutron <imprec@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPExiftool\Driver\Tag\FLIR;

use JMS\Serializer\Annotation\ExclusionPolicy;
use PHPExiftool\Driver\AbstractTag;

/**
 * @ExclusionPolicy("all")
 */
class EmbeddedImageHeight extends AbstractTag
{

    protected $Id = 2;

    protected $Name = 'EmbeddedImageHeight';

    protected $FullName = 'FLIR::EmbeddedImage';

    protected $GroupName = 'FLIR';

    protected $g0 = 'APP1';

    protected $g1 = 'FLIR';

    protected $g2 = 'Image';

    protected $Type = 'int16u';

    protected $Writable = false;

    protected $Description = 'Embedded Image Height';

}