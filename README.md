# Transitions
A custom WordPress theme with magical page load and unload transitions.

## Development
- Rename the folder to `transitions-dev`
- Install `npm i -g gulp-cli` if its not installed already.
- Run `npm i` and 
- Run `gulp dev` to build and watch for development
The build process compiles the source into a parallel folder named `transitions`. 

This project has a similar file setup to an angular project. The hope being eventually it might be transitioned _(he he he)_ into an Angular WP theme through some combination with my [Ng Wp Theme](https://github.com/arniebradfo/ng-wp-theme).

## Release Process
Running `gulp package` will compile all the necessary files into a parallel folder named `transitions`. Keep this folder as a checked out version of the `release` branch and commit releases from it. Never merge `master` back into `release`.
- Test it. (TODO: add a general test process).
- Switch to `master` branch.
- Add a description of the release in `ChangeLog.md`.
- Update all version numbers including the _Stable Tag_.
- Update WP _tested up to_ in `style.less`.
- Recompile with `gulp package`.
- Commit onto `master` with the version number in the commit note: `compiling vX.X.X`.
- Switch to the `release` branch.
- Commit onto `release` with the version number in the commit note: `updating to vX.X.X`.
- Push everything to github.
- Test it one final time.
- Create a new github release at [Code > Releases > Draft New](https://github.com/arniebradfo/Transitions/releases/new): `vX.X.X @ Target:release`, Add relevant release notes from `ChangeLog.md`.
- Close the github issues related to the release with a comment linking to the release page: _Fixed in [vX.X.X](https://github.com/arniebradfo/Transitions/releases/tag/vX.X.X)!_
- TODO: Publish to the WP Theme Repo through SVN
