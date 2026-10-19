# Routing, Middleware & Request Flow - instructor expected outcomes and response prompts

**Reference source:** `codebase/bootstrap/app.php`

## Original lesson steps

1. **Show the route table. Then say: “Each URL maps to a controller, the piece of code responsible for that resource.”**
2. **Trace a request through middleware. Then say: “Middleware sits in line between the request arriving and the handler running. It can check, log, or reject early.”**
3. **Show a failed check stopping the chain. Then say: “If authentication fails, the pipeline stops with the right status code and the controller never runs.”**
4. **Follow one request end to end. Then say: “From URL to router to middleware to controller to response, so you can point at exactly where any decision was made.”**

## Oral questions and example answers

- **Ask:** "What is middleware for?" **Expected answer:** shared work that should happen on every request, such as authentication or logging, kept in one place.
- **Ask:** "Why put access checks in middleware rather than each controller?" **Expected answer:** so the rule is written once and cannot be forgotten in one place.
- **Ask:** "What does the router do?" **Expected answer:** it matches the incoming URL to the code that should handle it.

## Assessing student evidence

Accept work when students can open the correct source, explain one meaningful code statement, demonstrate a valid local check, describe one error case and save their work in a disposable copy. Do not mark a blocked environment as passing. Do not mark raw copied code without explanation as complete.

## Teacher troubleshooting

When a student is stuck, ask: "Show me the exact line you changed. What was the expected result? Which command did you actually run? What did it return?" Check the working directory and dependencies before changing code.
