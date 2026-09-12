<?= $comment; ?>
<?= $functionStatement; ?>

    $locale = $this->resolveLocale($locale);
    $translationsLocales = PropelL10n::getLocaleChain($locale);

    foreach ($translationsLocales as $translationLocale) {
        $value = $this->getCurrentTranslation($translationLocale)->get<?= $columnPhpName; ?>(<?= $params; ?>);

        if ($value !== null) {
            return $value;
        }
    }

    return null;
}
