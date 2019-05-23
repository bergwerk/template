# BERGWERK Template Extension

Diese Extension wird nicht über composer installiert, sondern heruntergeladen, unter `public/typo3conf/ext/template` abgelegt und über das GIT des jeweiligen Projektes verwaltet.




## Ordnerstruktur Classes

### Classes/Command

Hier gibt es standardmäßig den `CiCommandController`, welcher nur beim Deployment genutzt wird, um ein `opcache_reset();` auszuführen.

### Classes/Controller

Hier gibt es standardmäßig den `ClearCacheController`, welcher nur beim Deployment genutzt wird, um ein `opcache_reset();` auszuführen.

### Classes/DataProcessing

Hier gibt es standardmäßig den `ConstantsProcessor`, der im TypoScript ausgeführt wird, um alle Konstanten im Fluid verfügbar zu haben.

### Classes/ViewHelpers

Hier gibt es einmal den `LanguageBaseViewHelper`, der im Language Menü verwendet wird. Falls eine Seite keine Übersetzungen hat wird der Nutzer beim Sprachen wechseln automatisch auf die Startseite geleitet. 
Der ViewHelper gibt nur die Base URL zu einer übergebenen Sprache zurück.

Dann gibt es noch den `SpriteViewHelper`, der das HTML für SVG-Sprites zurückgibt.

### Classes/Bootstrap.php

Das ist eine Utility Klasse, die verschiedene Funktionen für das TYPO3 bereitstellt.




## Ordnerstruktur Configuration

### Configuration/Commands.php

Hier werden die CLI-Commands definiert. Standardmäßig gibt es hier den Command `ci:cacheflush`, welcher nur beim Deployment genutzt wird, um ein `opcache_reset();` auszuführen.

### Configuration/Form/Default.yaml

Hier liegt die Konfigurationsdatei für die Form-Extension.

### Configuration/RTE/Default.yaml

Hier liegt die Konfigurationsdatei für den RTE.

### Configuration/TCA/Overrides/pages.php

Hier wird die TsConfig geladen.

### Configuration/TCA/Overrides/sys_template.php

Hier wird das TypoScript für die Auswahl im Template-Modul bereitgestellt.

### Configuration/TsConfig/Page

Hier liegen die TsConfig Dateien für den RTE, TCEFORM und TCEMAIN.

### Configuration/TsConfig/Page/Mod/WebLayout/BackendLayouts

Hier werden die Backend-Layouts abgelegt. Standarmäßig gibt es bereits ein 1-spaltiges Layout und ein 2-spaltiges Layout. 

Die Templates dafür liegen unter `Resources/Private/Templates/Page`.

### Configuration/TypoScript/Extensions

Hier liegen die TypoScript-Überschreibungen für Extensions.

### Configuration/TypoScript/Helper

Hier liegen Helper-Funktionalitäten, die in Fluid aufgerufen werden. 

Standardmäßig liegt hier der `DynamicContent.typoscript`-Helper, welcher die Inhalte einer Seite für eine colPos zurückgibt.

### Configuration/TypoScript/constants.typoscript

Diese Datei beinhaltet die Standard-Konstanten für das Projekt, wie Meta und Config Einstellungen.

### Configuration/TypoScript/setup.typoscript

Diese Datei beinhaltet das TypoScript für das Seiten-Rendering.





## Ordnerstruktur Resources

### Resources/Private/Extensions

Hier liegen die überschriebenen Extension-Templates. Für jede Extension wird hier ein Unterordner angelegt.

### Resources/Private/Language

Hier liegen die Standardübersetzungen. Falls man für eine Extension noch zusätzliche Übersetzungen braucht, erstellt man einen Unterordner, worin diese dann gepflegt werden.

### Resources/Private/Layouts/ContentElements

Hier liegen die Layouts für Custom Content Elemente.

### Resources/Private/Layouts/Page

Hier liegen die Layouts für die Seiten-Templates.

### Resources/Private/Partials/ContentElements

Hier liegen die Partials für Custom Content Elemente.

### Resources/Private/Partials/Page

Hier liegen die Partials für die Seiten-Templates.

### Resources/Private/Templates/ContentElements

Hier liegen die Templates für Custom Content Elemente.

### Resources/Templates/Partials/Page

Hier liegen die Templates für die Seiten-Templates. Hier liegen bereits die Templates für das 1-spaltige BE-Layout, sowie für das 2-spaltige BE-Layout.




## Extension-Handling

### Einbindung Standard-TypoScript

Das Standard-TypoScript wird unter `Configuration/TypoScript/setup.typoscript` bzw. unter `Configuration/TypoScript/constants.typoscript` inkludiert.

Beispiel aus `setup.typoscript`:

```
######################
#### DEPENDENCIES ####
######################
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:fluid_styled_content/Configuration/TypoScript/setup.typoscript">
```

### Überschreibung Standard-TypoScript

Überschreibungen von Extension-TypoScript werden standardmäßig unter `Configuration/TypoScript/Extensions` abgelegt.

Hier wird für die jeweilige Extension ein Ordner angelegt. In diesem Ordner gibt es dann eine `setup.typoscript` und eine `constants.typoscript`.

**Die Standard-Template-Pfade sollten nur erweitert und nicht überschrieben werden.**

Veranschaulichung Ordnerstruktur:

- ext/template/Configuration/TypoScript/Extensions
    - Beispielextension
        - constants.typoscript
        - setup.typoscript

Danach müssen die jeweiligen Dateien unter `Configuration/TypoScript/setup.typoscript` bzw. unter `ext/template/Configuration/TypoScript/constants.typoscript` inkludiert werden.

Beispiel aus `setup.typoscript`:

```
#############################
#### EXTENSION OVERRIDES ####
#############################
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:template/Configuration/TypoScript/Extensions/Form/setup.typoscript">
```

#### Überschreibung Template-Dateien

Es sollten immer nur Template-Dateien kopiert werden, die auch überschrieben werden.

Fluid-Dateien von Extensions liegen im Ordner `/Resources/Private/Extensions`

Dort wird dann widerrum ein Ordner für die jeweilige Extension angelegt.

Veranschaulichung Ordnerstruktur:

- ext/template/Resources/Private/Extensions
    - Beispielextension
        - Layouts
        - Partials
        - Templates
            - Index.html
