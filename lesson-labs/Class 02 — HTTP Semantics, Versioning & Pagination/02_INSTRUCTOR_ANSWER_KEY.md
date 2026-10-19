# HTTP Semantics, Versioning & Pagination - instructor expected outcomes and response prompts

**Reference source:** `codebase/routes/api.php`

## Original lesson steps

1. **Return the right status code for each outcome. Then say: “201 when you create something, 400 for a bad request, 401 when the caller is not logged in, 403 when they are not allowed, 404 when it does not exist.”**
2. **Introduce a version in the path. Then say: “New behaviour goes under /v2 while /v1 keeps working, so old clients are not broken.”**
3. **Add pagination to a list endpoint. Then say: “Never return ten thousand rows at once. Return one page with a way to fetch the next.”**
4. **Show the client reading the codes. Then say: “A good client can tell success from failure without reading the body, because the code is honest.”**

## Oral questions and example answers

- **Ask:** "What is the difference between 401 and 403?" **Expected answer:** 401 means you have not proved who you are; 403 means you are known but not allowed to do this.
- **Ask:** "Why version an API?" **Expected answer:** so you can change it for new clients without breaking the ones already using the old version.
- **Ask:** "Why paginate a list?" **Expected answer:** to keep responses fast and predictable, and to avoid flooding the client with data it does not need.

## Assessing student evidence

Accept work when students can open the correct source, explain one meaningful code statement, demonstrate a valid local check, describe one error case and save their work in a disposable copy. Do not mark a blocked environment as passing. Do not mark raw copied code without explanation as complete.

## Teacher troubleshooting

When a student is stuck, ask: "Show me the exact line you changed. What was the expected result? Which command did you actually run? What did it return?" Check the working directory and dependencies before changing code.
