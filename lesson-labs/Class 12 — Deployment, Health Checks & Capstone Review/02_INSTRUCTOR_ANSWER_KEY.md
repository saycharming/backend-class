# Deployment, Health Checks & Capstone Review - instructor expected outcomes and response prompts

**Reference source:** `codebase/routes/api.php`

## Original lesson steps

1. **Deploy the service. Then say: “Get the code onto the server where users can reach it, the same way every time.”**
2. **Add a health endpoint. Then say: “It answers one question: is the app up?”**
3. **Add a readiness check. Then say: “It answers a more careful question: is it ready to receive traffic yet, with its database connected?”**
4. **Walk the capstone end to end. Then say: “From a fresh checkout to a running, monitored service, so you can defend every part.”**

## Oral questions and example answers

- **Ask:** "What is a health check for?" **Expected answer:** so the platform knows whether the app is alive and can restart or route around it.
- **Ask:** "What is a readiness check for?" **Expected answer:** so traffic is not sent to a service that is still starting up.
- **Ask:** "Why does a deployment not guarantee a healthy service?" **Expected answer:** the code can be deployed and still fail to start or connect; the checks confirm it is actually working.

## Assessing student evidence

Accept work when students can open the correct source, explain one meaningful code statement, demonstrate a valid local check, describe one error case and save their work in a disposable copy. Do not mark a blocked environment as passing. Do not mark raw copied code without explanation as complete.

## Teacher troubleshooting

When a student is stuck, ask: "Show me the exact line you changed. What was the expected result? Which command did you actually run? What did it return?" Check the working directory and dependencies before changing code.
