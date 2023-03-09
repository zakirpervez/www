Official documentation of phpunit is available here, Please use it frequently. 
https://docs.phpunit.de/en/10.0/
Run phpunit test using this command.
`./vendor/bin/phpunit --version`
added the alias with above command 
`alias phpunit="./vendor/bin/phpunit"`
so whenever you want to run the php unit test just used the above alias. No need to use alias if you have installed the phpunit globally.
PhpUnit has two kind of test convention with function name aka test cases.
1. Put test prefix in front of function name.
2. If you don't want to put the test prefix in function name then add the document comment @test annotation in it that way you can add it which also consider as test case.

Mockery
Install mockery using the following command
`composer require mockery/mockery --dev` 
Refer this commit 86d28e4 to observe the all changes in code.
There are two ways to add the mockery in test case.
1. Extends the MockeryTestClass for example check ExampleTest
2. Add the tearDown method with Mockery::close() code. eg check OrderTest

