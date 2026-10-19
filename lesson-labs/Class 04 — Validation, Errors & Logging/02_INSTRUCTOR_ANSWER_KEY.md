# Validation, Errors & Logging - instructor expected outcomes and response prompts

**Reference source:** `codebase/app/Http/Controllers/PayTrackController.php`

## Original lesson steps

1. **Send a bad request and show the rejection. Then say: “Validation checks that the request contains what we expect and rejects it politely when it does not.”**
2. **Show a clean error response. Then say: “It says what was wrong and which field caused it, using the right status code.”**
3. **Point out what must never leak. Then say: “No stack traces, no secrets, no database details in a response. Those belong in logs.”**
4. **Search the logs for that request. Then say: “A structured log lets you find the exact request later when support asks.”**

## Oral questions and example answers

- **Ask:** "Why validate at the edge, in the API?" **Expected answer:** so the rest of the code can assume clean data and does not have to defend itself everywhere.
- **Ask:** "What should an error response contain?" **Expected answer:** what went wrong, the field if relevant, and a correct status code — never internal details.
- **Ask:** "Why log in a structured way?" **Expected answer:** so you can search it later by request, user or error instead of reading it line by line.

## Assessing student evidence

Accept work when students can open the correct source, explain one meaningful code statement, demonstrate a valid local check, describe one error case and save their work in a disposable copy. Do not mark a blocked environment as passing. Do not mark raw copied code without explanation as complete.

## Teacher troubleshooting

When a student is stuck, ask: "Show me the exact line you changed. What was the expected result? Which command did you actually run? What did it return?" Check the working directory and dependencies before changing code.
