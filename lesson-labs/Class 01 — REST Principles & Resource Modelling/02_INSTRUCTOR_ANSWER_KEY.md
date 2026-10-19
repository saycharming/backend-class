# REST Principles & Resource Modelling - instructor expected outcomes and response prompts

**Reference source:** `codebase/routes/api.php`

## Original lesson steps

1. **List the nouns in the system. Then say: “Customers, orders, products, payments. These are our resources, and each gets its own address.”**
2. **Decide the addresses and the verbs. Then say: “GET /orders/42 reads one order, POST /orders creates one, PATCH updates, DELETE removes. The verb is in the method, not the address.”**
3. **Fix the naming convention once. Then say: “Plural nouns, lowercase, no verbs in the URL. A team that agrees on names stops arguing about every endpoint.”**
4. **Sketch the operations for one resource. Then say: “Write down what each endpoint takes and returns before any code is written.”**

## Oral questions and example answers

- **Ask:** "Why is `GET /orders/42` better than `POST /getOrderById`?" **Expected answer:** the address names a resource and the method says what to do; it is predictable and cacheable.
- **Ask:** "What is a resource?" **Expected answer:** a thing the API manages, such as a customer or an order, with its own address.
- **Ask:** "Why avoid verbs in URLs?" **Expected answer:** the HTTP method already expresses the action, so mixing them creates confusion and duplication.

## Assessing student evidence

Accept work when students can open the correct source, explain one meaningful code statement, demonstrate a valid local check, describe one error case and save their work in a disposable copy. Do not mark a blocked environment as passing. Do not mark raw copied code without explanation as complete.

## Teacher troubleshooting

When a student is stuck, ask: "Show me the exact line you changed. What was the expected result? Which command did you actually run? What did it return?" Check the working directory and dependencies before changing code.
