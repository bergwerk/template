# BERGWERK Template Extension

A TYPO3 CMS Extension for developing a Basic Foundation TYPO3 Template. In this extension shall all necessary files and dependencies for the TYPO3 Webiste be included.

### Dependencies
- TYPO3
- Fluid Styled Content

This extension is prepared to use it out of the box with the following extensions:

- Form

---

## Quick Guide

### 1. TypoScript

- Include all typoscript from external extensions in the `setup.txt` or `constants.txt`.
- All internal typoscript is included over `INCLUDE DIR`. So you can easily split big files in small clear files.
- For new constants add the possibility to adjust the constants in the constant editor in the backend.

### 2. Backend Layouts

There are two basic backend layouts preconfigured.

- Full width 
- Two Columns

The backend layouts can be configured in `Configuration/TsConfig/Page/Mod/WebLayout/BackendLayouts`. The template path is automatically generated in `Configuration/TypoScript/setup.typoscript`.

If you add a new backend layout, please take care for the editor and add a new icon for this backend layout. 

---

## Extension Guide
