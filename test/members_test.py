"""
Tests for the validity of the members.yml file.
"""

import os
import unittest
from typing import Dict, Any

import yaml

from base_test import TestCaseBase


class MembersTest(TestCaseBase):
    """This class contains tests for the validity of the members.yml file."""
    filename: str = "members.yml"
    parent_dir: str = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
    file_path: str = os.path.join(parent_dir, "_data", filename)

    @classmethod
    def setUpClass(cls) -> None:
        """This class method loads the members file and is called before all tests."""
        with open(fr"{cls.file_path}", encoding="utf-8") as f:  # open members file
            members_file: Dict[str, Any] = yaml.load(f, Loader=yaml.FullLoader)  # load as yaml object
        cls.members_file = members_file

    def test_members_image_url_validity(self):
        """Tests for the validity of the images urls in members.yml"""
        # check if members.yml is empty
        self.assertTrue(len(self.members_file), f"{self.filename} is empty")

        # iterate the members of each member category and check if the recorded image urls exist
        for members in self.members_file.values():
            for member in members:
                if "image" in member:
                    image_url = member["image"]

                    # check if the image_url is an absolute path
                    self.assertTrue(os.path.isabs(image_url), f"{image_url} is not an absolute path")

                    # check if the image exists
                    image_path = os.path.join(self.parent_dir, *image_url.split("/"))
                    self.assertIsFile(image_path)


if __name__ == "__main__":
    unittest.main()
