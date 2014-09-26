# Logic Processor

[![Build Status](https://travis-ci.org/ve-interactive/logicprocessor.svg?branch=master)](https://travis-ci.org/ve-interactive/logicprocessor)
[![Code Coverage](https://scrutinizer-ci.com/g/ve-interactive/logicprocessor/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ve-interactive/logicprocessor/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ve-interactive/logicprocessor/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ve-interactive/logicprocessor/?branch=master)
[![HHVM Status](http://hhvm.h4cc.de/badge/ve-interactive/logicprocessor.svg)](http://hhvm.h4cc.de/package/ve-interactive/logicprocessor)

Library to process logical rules and apply outcomes based on the result of those rules.

The package consists of `Rule`s, `Modifier`s, `RuleSet`s and `Mutator`s.

A `Rule` contains the logic to extract a value from a context and contain a `Modifier`.
A `Modifier` represents a logical operation that results in a boolean value.
`Rule`s and `Modifier`s work together to perform assertions on sets of data.

Multiple rules can be grouped to form a `RuleSet` to create more complex logic.

`RuleSet`s can also contain one or more `Mutator`s that will modify a target entity should the rules evaluate to true.

## Data Structure

https://github.com/ve-interactive/logicprocessor/wiki/JSON-data-structure
