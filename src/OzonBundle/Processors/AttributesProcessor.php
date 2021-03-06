<?php

namespace Savosik\OzonBundle\Processors;

use Pimcore\Model\DataObject\Classificationstore;


class AttributesProcessor
{

    public function createClassificationStore($store_name)
    {
        $config = Classificationstore\StoreConfig::getByName($store_name);
        if (!$config) {
            $config = new Classificationstore\StoreConfig();
            $config->setName($store_name);
            $config->save();
        }

        return $config->getId();
    }


    public function createCollection($store_id, $collection_name, $collection_description = '')
    {
        $config = Classificationstore\CollectionConfig::getByName($collection_name, $store_id);
        if (!$config) {
            $config = new Classificationstore\CollectionConfig();
            $config->setName($collection_name);
            $config->setDescription($collection_description);
            $config->setStoreId($store_id);
            $config->save();
        }

        return $config->getId();
    }


    public function createGroup($store_id, $group_name, $group_description = '')
    {
        $config = Classificationstore\GroupConfig::getByName($group_name, $store_id);
        if (!$config) {
            $config = new Classificationstore\GroupConfig();
            $config->setStoreId($store_id);
            $config->setName($group_name);
            $config->setDescription($group_description);
            $config->save();
        }

        return $config->getId();
    }


    public function addGroupToCollection($collection_id, $group_id)
    {
        $config = new Classificationstore\CollectionGroupRelation();
        $config->setColId($collection_id);
        $config->setGroupId($group_id);
        $config->save();
    }


    public function createProperty($store_id, $prop_name, $prop_description = '')
    {

        $definition = [
            'fieldtype' => 'input',
            'name' => $prop_name,
            'title' => $prop_name,
            'datatype' => 'data',
        ];

        $config = new Classificationstore\KeyConfig();
        $isset_config = $config::getByName($prop_name, $store_id);

        if (!$isset_config) {
            $config->setName($prop_name);
            $config->setTitle($prop_name);
            $config->setType('input');
            $config->setDescription($prop_description);
            $config->setStoreId($store_id);
            $config->setEnabled(1);
            $config->setDefinition(json_encode($definition));
            $config->save();
        }

        return $config->getId();
    }


    public function createPropertyByOzonAttribute($store_id, $ozon_attribute, $ozon_category_id, $dictionary_elements = [])
    {


        return 0;
    }


    public function addPropertyToGroup($group_id, $property_id)
    {

    }

}
