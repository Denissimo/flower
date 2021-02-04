<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\CustomTranslationUniversal;
use Sonata\AdminBundle\Translator\LabelTranslatorStrategyInterface;
use App\Repository\CustomTranslationUniversalRepository as TranslatorRepository;

class CustomLabelTranslatorStrategy implements LabelTranslatorStrategyInterface
{
    /**
     * @var TranslatorRepository
     */
    private $translatorRepository;

    /**
     * CustomLabelTranslatorStrategy constructor.
     *
     * @param TranslatorRepository $translatorRepository
     */
    public function __construct(TranslatorRepository $translatorRepository)
    {
        $this->translatorRepository = $translatorRepository;
    }

    public function getLabel($label, $context = '', $type = '', string $to = 'ru')
    {
        $translation = $this->translatorRepository->findFrom($label, 'en');

        return $translation instanceof CustomTranslationUniversal ?
            $translation->getByTo($to) : sprintf('%s: %s', CustomTranslationUniversal::$untrnslated[$to], $label);
    }
}
