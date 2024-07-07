## Jekyll source code for the new Euclid website

### Directory structure

Inside the [`.dev`](.dev) directory, there are temporary files used during development. Inside the [`_pages`](_pages) directory, there are all the static pages of the site. The rest of the directories are standard Jekyll directory structure.

### How to build and run

The project requires [Bundler](https://bundler.io/). See the `build` and `serve` task in the [Makefile](Makefile). The Makefile will install global dependencies and is better suited for use inside a container.

### How to contribute

1. Select an issue and assign yourself to it. Make the assignment before doing anything else in order to avoid overlap. Please consider prioritizing pinned issues (if there are any).
2. Depending on the issue, you might have to post the design you are considering implementing for approval before starting coding. If needed, ask for additional information too.
3. When you are ready to implement, create a new branch and link it to the issue. Remember to create the new branch from `main`.
4. Implement your first round of changes on that branch and pull request on `main`. Note that there might be multiple rounds of review before your changes get accepted.

#### Some reasonable expectations on the development process

1. Use reasonable commit messages (the first line of the commit description) and reasonable PR names. This should be obvious but commit messages will appear in the modification history of the (hopefully) merged branch. "changes" is not a particularly good commit message. "256 Update test" is not a particularly good PR name.
2. Always include a (brief) description of your PRs and link the relevant issues. Having a new PR with a "No description provided" placeholder text is not particularly encouraging to review. The reviewer cannot possibly go through your code and compile a summary themselves. You should always be able to summarily describe your suggested modifications.
3. Always include a (brief) description of your PR revisions using a comment in the PR. The reviewer has to know somehow that you finished your revision and get informed about the changes made. Throwing in some commits and hoping for the best is not enough. You have to describe your changes; that is describe them in general, not each individual line. You can also share your thoughts here, argue about your decisions, and point out any limitations or problems.
4. You are highly encouraged to include reasonable commit messages, see for example [dd4fd3](https://github.com/gstamatelat/euclid.ee.duth.gr/commit/dd4fd3803687d65b265ebbdac795790e3912fd51). This is not required if the commit is kept short and the message descriptive.
