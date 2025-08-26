//  Es module syntax
import { get_encoding } from "tiktoken";
import OpenAI from "openai";
// const { get_encoding } = require("tiktoken");

//  token ID -> token
const encoding = get_encoding("cl100k_base");
const tokens = encoding.encode(
  "Hello world! This is the first test of tiktoken library"
);
console.log(tokens);

const client = new OpenAI({
  apiKey: OPENAI_API_KEY,
});

const stream = await client.responses.create({
  model: "gpt-4.1",
  input: "Write a story about a robot",
  temperature: 0.7,
  max_output_tokens: 50,
});

for await (const event of stream) {
  if (event.delta) {
    process.stdout.write(event.delta);
  }
}
