# Logic Processor

[![Build Status](https://travis-ci.org/ve-interactive/logicprocessor.svg?branch=master)](https://travis-ci.org/ve-interactive/logicprocessor)
[![Code Coverage](https://scrutinizer-ci.com/g/ve-interactive/logicprocessor/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ve-interactive/logicprocessor/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ve-interactive/logicprocessor/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ve-interactive/logicprocessor/?branch=master)
[![HHVM Status](http://hhvm.h4cc.de/badge/ve-interactive/logicprocessor.svg)](http://hhvm.h4cc.de/package/ve-interactive/logicprocessor)

Library to process logical rules and apply outcomes based on the result of those rules.

## How it all works

The package consists of `Rule`s, `Assertion`s, `Rule`s, `Modifier`s, `RuleSet`s and a `Processor`.

The main process centers around the `Processor`. This is responsible for taking a `Context` and a `Target` to work out
which sets of rules are valid and applying their results. The `Processor` takes a `Context` and applies `Rule`s to it.
If the `Rule`s pass then a `Modifier` is applied to the `Target`.

The `Context` is the data that is being inspected whilst the `Target` is the data that is being modified and is passed
by reference. Both can be an array or object or whatever you want and both can be the same thing.

The `Processor` expects to be passed one or more `RuleSet`s. A `RuleSet` is a combination of a single `Rule` and one or
more `Modifiers`.

A `Rule` is combined with an `Assertion` to perform logical assertions on the `Context`. `Rule`s should be able to select
data from the `Context` and then should apply an `Assertion` to this data to return a boolean value to indicate success
or failure.

A `Result` should modify data within the `Target`. They work in much the same way as `Rule`s in that they select data
 and pass this to a `Modifier` and apply the result.
 
[Sample code](https://github.com/ve-interactive/logicprocessor/wiki/Sample-test-code)

### Why is this all so complicated

While this whole process might seem complicated it allows for great flexibility when it comes to creating user-buildable
rules. The `Rule`s and `Result`s allow a user to pinpoint a single piece of data and define how to examine and modify it.

## Builder

The `Builder` class can be used to create sets of rules quickly from an array structure. This first requires setting up
the various libraries so the `Builder` can create the needed classes for you. 

The format of the array is represented in the JSON object below.

https://github.com/ve-interactive/logicprocessor/wiki/JSON-data-structure
