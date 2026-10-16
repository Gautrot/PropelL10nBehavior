<?php

echo <<<PHP
        if (\$l && \$$localeVariableName = \$l->get$localeColumnName()) {
            \$this->set$localeColumnName(\$$localeVariableName);
            \$this->currentTranslations[\$$localeVariableName] = \$l;
        }


PHP;
