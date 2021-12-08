<?php

declare(strict_types=1);

use Cadotinfo\TwigBundle\Twig\AllExtension;
use PHPUnit\Framework\TestCase;

final class functionTest extends TestCase
{
    public function testTBgetFilename(): void
    {
        $twig = new AllExtension();
        $return = $twig->TBgetFilename('/app/public/uploads/document/fichier/Brain-Diseases-02112021-essai-61af947debc0a.docx');
        $this->assertSame('Brain-Diseases-02112021-essai.docx', $return);
    }
}
