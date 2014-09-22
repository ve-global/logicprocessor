# Logic Processor

[![Build Status](https://travis-ci.org/ve-interactive/logicprocessor.svg?branch=master)](https://travis-ci.org/ve-interactive/logicprocessor)
[![Code Coverage](https://scrutinizer-ci.com/g/ve-interactive/logicprocessor/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ve-interactive/logicprocessor/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ve-interactive/logicprocessor/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ve-interactive/logicprocessor/?branch=master)

Library to process logical rules and apply outcomes based on the result of those rules.

Proposed data structure:
 ```JSON
[
    {
        "rules": [
            {
                "name": "rule_name",
                "modifier": "<=",
                "value": 123
            },
            {
                "name": "other_rule",
                "modifier": "!=",
                "value": "foobar"
            }
        ],
        "result": [
            {
                "name": "promotion",
                "modifier": "%",
                "value": 123
            }
        ]
    }
]
```
