"""
Common extensions for testing.
"""

import os
import unittest


class TestCaseBase(unittest.TestCase):
    """This class contains useful extensions for testing."""

    def assertIsFile(self, path):
        """Test that a file exists. If the provided filepath does not exist, the test will fail."""
        self.assertTrue(os.path.isfile(path), f"File {path} does not exist!")
