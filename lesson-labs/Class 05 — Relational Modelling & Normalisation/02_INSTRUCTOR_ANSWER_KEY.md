# Relational Modelling & Normalisation - instructor expected outcomes and response prompts

**Reference source:** `codebase/database/migrations/2026_01_01_000002_paytrack.php`

## Original lesson steps

1. **List the entities. Then say: “Customer, order, product, order line. Each becomes a table.”**
2. **Draw the relationships. Then say: “One customer to many orders, one order to many lines. Each link uses a key.”**
3. **Show the duplication problem. Then say: “Copying the product price into every order line means one change must update many rows.”**
4. **Normalise it. Then say: “Store the price once and look it up through the relationship instead.”**

## Oral questions and example answers

- **Ask:** "What is normalisation in one sentence?" **Expected answer:** making sure each fact is stored in exactly one place.
- **Ask:** "What is a foreign key?" **Expected answer:** a column that points at a row in another table, creating the link between them.
- **Ask:** "Why is duplication dangerous?" **Expected answer:** the copies drift over time and you can no longer tell which one is correct.

## Assessing student evidence

Accept work when students can open the correct source, explain one meaningful code statement, demonstrate a valid local check, describe one error case and save their work in a disposable copy. Do not mark a blocked environment as passing. Do not mark raw copied code without explanation as complete.

## Teacher troubleshooting

When a student is stuck, ask: "Show me the exact line you changed. What was the expected result? Which command did you actually run? What did it return?" Check the working directory and dependencies before changing code.
