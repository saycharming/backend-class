# Rate Limiting & Performance Measurement - instructor expected outcomes and response prompts

**Reference source:** `codebase/routes/api.php`

## Original lesson steps

1. **Add a rate limit. Then say: “Each client gets a fair number of requests in a window, and the rest are politely rejected.”**
2. **Show the rejection in action. Then say: “A clear 'slow down' status rather than a mysterious failure.”**
3. **Measure under load. Then say: “Record requests per second and the slowest endpoint instead of guessing what is fast.”**
4. **Make one change and measure again. Then say: “Add an index or a cache and prove with numbers that it helped.”**

## Oral questions and example answers

- **Ask:** "Why add rate limiting?" **Expected answer:** to protect the service from accidental floods and deliberate abuse alike.
- **Ask:** "Why measure before optimising?" **Expected answer:** otherwise 'fast enough' is a guess and you may optimise the wrong thing.
- **Ask:** "What is a fair way to limit a client?" **Expected answer:** a fixed number of requests per time window, with a clear response when exceeded.

## Assessing student evidence

Accept work when students can open the correct source, explain one meaningful code statement, demonstrate a valid local check, describe one error case and save their work in a disposable copy. Do not mark a blocked environment as passing. Do not mark raw copied code without explanation as complete.

## Teacher troubleshooting

When a student is stuck, ask: "Show me the exact line you changed. What was the expected result? Which command did you actually run? What did it return?" Check the working directory and dependencies before changing code.
