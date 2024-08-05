<?php

declare(strict_types=1);

/*
 * This file is part of Sulu.
 *
 * (c) Sulu GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Bundle\ContentBundle\Content\Domain\Model;

trait AdditionalWebspaceTrait
{
    /**
     * @var string|null
     */
    protected ?string $additionalWebspace;

    /**
     * @return string|null
     */
    public function getAdditionalWebspace(): ?string
    {
        return $this->additionalWebspace;
    }


    /**
     * @param string|null $additionalWebspace
     */
    public function setAdditionalWebspace(?string $additionalWebspace): void
    {
        $this->additionalWebspace = $additionalWebspace;
    }
}
