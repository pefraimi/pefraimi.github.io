.PHONY: all build serve

all: serve

build:
	bundle install
	bundle exec jekyll build

serve:
	bundle install
	bundle exec jekyll serve
