<?php

/*
 * CKFinder
 * ========
 * https://ckeditor.com/ckfinder/
 * Copyright (c) 2007-2021, CKSource - Frederico Knabben. All rights reserved.
 *
 * The software, this file and its contents are subject to the CKFinder
 * License. Please read the license.txt file before using, installing, copying,
 * modifying or distribute this file or part of its contents. The contents of
 * this file is part of the Source Code of CKFinder.
 */

namespace CKSource\CKFinder\Command;

use CKSource\CKFinder\Acl\Permission;
use CKSource\CKFinder\Event\CKFinderEvent;
use CKSource\CKFinder\Event\CreateFolderEvent;
use CKSource\CKFinder\Filesystem\Folder\WorkingFolder;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;

class CreateFolder extends CommandAbstract
{
    protected $requestMethod = Request::METHOD_POST;

    protected $requires = [Permission::FOLDER_CREATE];

    /**
     * Транслитерация текста
     * @param $text
     * @return string
     */
    public function urlToTranslit($text): string
    {
        $tr = array(
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D',
            'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh', 'З' => 'Z', 'И' => 'I',
            'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',
            'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C', 'Ч' => 'Ch',
            'Ш' => 'Sh', 'Щ' => 'W', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '',
            'Э' => 'Ye', 'Ю' => 'Yu', 'Я' => 'Ya',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
            'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
            'й' => 'j', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'w', 'ъ' => '', 'ы' => 'y', 'ь' => '',
            'э' => 'ye', 'ю' => 'yu', 'я' => 'ya',
            '!' => '', '@' => '', '#' => '', '$' => '', '%' => '',
            '^' => '', '&' => '', '*' => '', '(' => '', ')' => '',
            '"' => '', ' ' => '_', ';' => '', ':' => '', '?' => '',
            '[' => '', ']' => '', '{' => '', '}' => '', '\'' => '',
            ',' => '', '/' => '', '<' => '', '>' => '',
            '\\' => '', '|' => '', '=' => '', '+' => '',
            '№' => '',
        );

        return strtr($text, $tr);
    }

    public function execute(Request $request, WorkingFolder $workingFolder, EventDispatcher $dispatcher)
    {
        $newFolderName = (string) $request->query->get('newFolderName', '');
        $newFolderName = strtolower($this->urlToTranslit($newFolderName));

        $createFolderEvent = new CreateFolderEvent($this->app, $workingFolder, $newFolderName);

        $dispatcher->dispatch($createFolderEvent, CKFinderEvent::CREATE_FOLDER);

        $created = false;
        $createdFolderName = null;

        if (!$createFolderEvent->isPropagationStopped()) {
            $newFolderName = $createFolderEvent->getNewFolderName();
            list($createdFolderName, $created) = $workingFolder->createDir($newFolderName);
        }

        return ['newFolder' => $createdFolderName, 'created' => (int) $created];
    }
}
