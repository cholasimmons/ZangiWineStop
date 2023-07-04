# Zangi Wine Stop

#

`src` folder contains raw static html files used to design the layout.

`dist` contains the final php output files used by [Couch CMS](https://couchcms.com)

#

## Instructions

### Installation

```bash
pnpm install
```
#
### Build Output

```
pnpm build
```
This command builds (in realtime) a compact CSS file from the src folder to the output folder, ready for production.
#
### Run Test Build

```
pnpm dev
```
Fires up [live-server][deff] and automatically opens the src folder as project root.

[deff]: https://npmjs.com/packages/live-server
#
#

## Couch CMS

You are required to provide your own ``config.php`` file with access credentials, and a database ready for Couch to install to.

An `config.example.php` file is provided on the root of the couch folder