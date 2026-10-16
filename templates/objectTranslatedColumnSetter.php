<?= $comment; ?>
<?= $functionStatement; ?>

    $this->getCurrentTranslation($<?= $localeVariableName; ?>)->set<?= $columnPhpName; ?>(<?= $params; ?>);

    return $this;
}

