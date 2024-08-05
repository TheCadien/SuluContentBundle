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

namespace Sulu\Bundle\ContentBundle\Content\Infrastructure\Doctrine;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Tools\Event\GenerateSchemaTableEventArgs;
use Sulu\Bundle\ContentBundle\Content\Domain\Model\AdditionalWebspaceInterface;

final class SchemaLoader
{
    public function postGenerateSchemaTable(GenerateSchemaTableEventArgs $event): void
    {
        $metadata = $event->getClassMetadata();
        $reflection = $metadata->getReflectionClass();

        if ($reflection->implementsInterface(AdditionalWebspaceInterface::class)) {
            $tableName = $metadata->getTableName() . '_dimension_content_webspace';
            $event->getSchema()->hasTable($tableName);
            $this->addTableToSchema($event->getSchema(), $tableName);
        }
    }

    private function addTableToSchema(Schema $schema, string $name): void
    {
        $schema->cre
        $table = $schema->createTable($name);

        $table->addColumn('id', Types::BIGINT);
        $table->addColumn('webspace', Types::STRING);
    }
}
