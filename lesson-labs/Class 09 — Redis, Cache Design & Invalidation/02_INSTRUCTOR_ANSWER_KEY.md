# Redis, Cache Design & Invalidation - instructor expected outcomes and response prompts

**Reference source:** `codebase/config/cache.php`

## Original lesson steps

1. **Show the slow read. Then say: “Measure how long the endpoint takes before adding a cache, so you know whether it helped.”**
2. **Add a cache in front of the read. Then say: “Store the result close at hand so the next request is served instantly. Redis is an in-memory store for exactly this.”**
3. **Set a time to live. Then say: “Even a missed invalidation heals itself after a while.”**
4. **Change the data and show the stale value, then fix invalidation. Then say: “The hard question is when to throw the cached copy away. For money data, delete on every write.”**

## Oral questions and example answers

- **Ask:** "What is the hard part of caching?" **Expected answer:** invalidation: deciding when the cached copy is no longer valid.
- **Ask:** "Why is a stale balance worse than no cache?" **Expected answer:** a user acts on wrong information, which in a payments system is a correctness bug.
- **Ask:** "Why give every cache entry a time to live?" **Expected answer:** so a missed invalidation self-heals instead of serving stale data forever.

## Assessing student evidence

Accept work when students can open the correct source, explain one meaningful code statement, demonstrate a valid local check, describe one error case and save their work in a disposable copy. Do not mark a blocked environment as passing. Do not mark raw copied code without explanation as complete.

## Teacher troubleshooting

When a student is stuck, ask: "Show me the exact line you changed. What was the expected result? Which command did you actually run? What did it return?" Check the working directory and dependencies before changing code.
