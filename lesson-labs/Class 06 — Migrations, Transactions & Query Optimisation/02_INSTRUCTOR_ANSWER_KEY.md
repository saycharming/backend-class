# Migrations, Transactions & Query Optimisation - instructor expected outcomes and response prompts

**Reference source:** `codebase/database/migrations/2026_01_01_000002_paytrack.php`

## Original lesson steps

1. **Write a migration. Then say: “A migration is a versioned script that changes the structure, and it runs in order on every machine so everyone stays in step.”**
2. **Run it on a clean database. Then say: “Prove the migration works from scratch, not only on your already-modified machine.”**
3. **Show a transaction. Then say: “Wrap several changes so that if one fails, the rest are undone. Money is never taken without the order being recorded.”**
4. **Find a slow query and add an index. Then say: “A query that scans a whole table collapses under traffic; an index makes the lookup fast.”**

## Oral questions and example answers

- **Ask:** "Why use migrations instead of editing the database by hand?" **Expected answer:** they are versioned and repeatable, so every machine ends up the same.
- **Ask:** "What does a transaction guarantee?" **Expected answer:** that a group of changes all succeed or all fail together.
- **Ask:** "When do you need an index?" **Expected answer:** when you look up rows by a column and a full scan would be too slow.

## Assessing student evidence

Accept work when students can open the correct source, explain one meaningful code statement, demonstrate a valid local check, describe one error case and save their work in a disposable copy. Do not mark a blocked environment as passing. Do not mark raw copied code without explanation as complete.

## Teacher troubleshooting

When a student is stuck, ask: "Show me the exact line you changed. What was the expected result? Which command did you actually run? What did it return?" Check the working directory and dependencies before changing code.
