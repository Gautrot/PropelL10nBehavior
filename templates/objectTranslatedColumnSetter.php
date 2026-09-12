<?= $comment; ?>
<?= $functionStatement; ?>
    $this->getCurrentTranslation($locale)->set<?= $columnPhpName; ?>(<?= $params; ?>);

    return $this;
}

