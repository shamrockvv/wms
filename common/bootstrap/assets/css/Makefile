# Makefile for generating minified files

.PHONY: all

# we cheat and process all .css files instead of an exhaustive list
all: $(patsubst %.css,%.min.css,$(filter-out %.min.css,$(wildcard *.css)))

%.min.css: %.css
	yuicompressor $< -o $@
