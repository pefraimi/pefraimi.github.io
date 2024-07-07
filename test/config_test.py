"""
Tests for the validity of the config.yml file.
"""

import os
import unittest
from typing import Dict, List, Union, Any

import yaml

from base_test import TestCaseBase


class ConfigTest(TestCaseBase):
    """This class contains tests for the validity of the _config.yml file."""
    filename: str = "_config.yml"
    parent_dir: str = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
    file_path: str = os.path.join(parent_dir, filename)

    @classmethod
    def setUpClass(cls) -> None:
        """This class method loads the config file and is called before all tests."""
        with open(fr"{cls.file_path}", encoding="utf-8") as f:  # open config file
            config_file: Dict[str, Any] = yaml.load(f, Loader=yaml.FullLoader)  # load as yaml object
        cls.config_file = config_file

    def test_menu_validity(self):
        """Tests for the validity of the menu variable in config.yml."""
        # check if 'menu' is present
        self.assertIn("menu", self.config_file.keys(), f"Menu is not found in {self.filename}")

        # menu is a list containing dicts with string keys.
        # The value of each key can be either a string or a list of strings.
        menu: List[Dict[str, Union[str, List[str]]]] = self.config_file["menu"]

        elements = ["page", "submenu"]
        for menu_entry in menu:
            # check the presence of 'page' in entries
            self.assertIn("page", menu_entry, "'page' element must be included in every menu entry!")

            for element, val in menu_entry.items():
                # check the type of entry elements. They must be strings.
                self.assertIsInstance(element, str, f"'{element}' must be a string! Found {type(element)}.")
                # check if the element is included in the possible elements.
                self.assertIn(element, elements, f"The possible elements are {elements}! Found {element}.")

                if element == "page":
                    # check the type of the value of the key='page'. It must be string.
                    self.assertIsInstance(val, str, f"'{val}' must be a string! Found {type(val)}")
                    # check if the value under 'page' is .md.
                    if val.endswith(".md") or val.endswith(".html"):
                        # check the presence of the .md or .html file
                        self.assertIsFile(os.path.join(self.parent_dir, val))
                else:
                    # check that element's name is 'submenu'
                    self.assertTrue(element == "submenu", f"Element must be 'submenu'! Found {element}.")
                    # check the type of the value of the key='submenu'. It must be a list of strings.
                    self.assertIsInstance(val, list, f"'submenu' entries should be of type list! Found {type(val)}")
                    for page in val:
                        # check the type of the specified page under 'submenu'.
                        self.assertIsInstance(page, str,
                                              f"Pages in submenu should be of type string!"
                                              f" {page} for page {menu_entry['page']} is {type(page)}")
                        # check the presence of a file under 'submenu'.
                        self.assertIsFile(os.path.join(self.parent_dir, page))

    def test_sidebar_validity(self):
        """Tests for the validity of the sidebar_theme variable in config.yml."""
        # check if 'sidebar_theme' is present
        self.assertIn("sidebar_theme", self.config_file.keys(), f"sidebar_theme is not found in {self.filename}.")

        theme: str = self.config_file["sidebar_theme"]

        themes = ["dark", "light"]
        # check the type of the specified theme. It must be a string.
        self.assertIsInstance(theme, str, f"'{theme}' must be a string! Found {type(theme)}.")
        # check if the specified theme is included in the possible themes.
        self.assertIn(theme, themes, f"The possible values are {themes}! Found {theme}.")


if __name__ == "__main__":
    unittest.main()
