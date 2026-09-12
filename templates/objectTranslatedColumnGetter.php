<?= $comment ?>
<?= $functionStatement ?>

return $this->getCurrentTranslation(<?= $locale ?>)->get<?= $columnPhpName ?>(<?= $params ?>);
}
