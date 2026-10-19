# Unit-Integration Testing & OpenAPI - instructor expected outcomes and response prompts

**Reference source:** `codebase/tests/Feature/PayTrackTest.php`

## Original lesson steps

1. **Write a failing test first. Then say: “A unit test checks one small piece of logic on its own and fails until the code is correct.”**
2. **Make it pass, then tidy up. Then say: “The loop: red, green, refactor. It keeps your attention on the behaviour you want.”**
3. **Write an integration test. Then say: “This checks several pieces working together, often against a real test database.”**
4. **Add an OpenAPI description. Then say: “A written description of your endpoints that tools can read to generate docs or clients.”**

## Oral questions and example answers

- **Ask:** "What is the difference between a unit test and an integration test?" **Expected answer:** a unit test checks one piece in isolation; an integration test checks pieces working together.
- **Ask:** "Why write a failing test first?" **Expected answer:** it proves the test can fail, so a pass later actually means something.
- **Ask:** "What is OpenAPI for?" **Expected answer:** describing the API in a machine-readable way so others can document or call it correctly.

## Assessing student evidence

Accept work when students can open the correct source, explain one meaningful code statement, demonstrate a valid local check, describe one error case and save their work in a disposable copy. Do not mark a blocked environment as passing. Do not mark raw copied code without explanation as complete.

## Teacher troubleshooting

When a student is stuck, ask: "Show me the exact line you changed. What was the expected result? Which command did you actually run? What did it return?" Check the working directory and dependencies before changing code.
