<h1 align="center">Chinilla-PHP</h1>

## Overview

Chinilla-PHP supports the functions of obtaining current blockchain information, obtaining current altitude, obtaining current network information, creating new wallets, generating mnemonics, initiating transactions, and obtaining transaction records in Chinilla's HCX.

## Supported Methods

### Node

#### Blockchain

- ✅ Current blockchain information `getBlockchainState()`
- ✅ Get the full block via `getBlock(header_hash)`
- ✅ Get the full block list `getBlocks()`
- ✅ Get block record by `getBlockRecordByHeight(height)`
- ✅ Get block record via `getBlockRecord(header_hash)`
- ✅ Get a list of block records `getBlockRecords()`
- ✅ Get unfinished header blocks `getUnfinishedBlockHeaders()`
- ✅ Get an estimate of the total drawing space `getNetworkSpace()`
- ✅ Get the block's currency addition and deletion records `getAdditionsAndRemovals()`
- ✅ Get the initial freezing period of the blockchain `getInitialFreezePeriod()`
- ✅ Get current network information `getNetworkInfo()`

#### Currency

- ✅ Get coin records through `getCoinRecordsByPuzzleHash(puzzle_hash)`
- ✅ Get coin records through array `getCoinRecordsByPuzzleHashes(array(puzzle_hash, puzzle_hash, ...))`
- ✅ Get coin record `getCoinRecordByName(coin_name)`
- 🚧 Push transaction packets to mempool and blockchain `pushTx()`

#### Memory Pool

- ✅ Get list of transaction IDs (spend bundle hash) `getAllMempoolTxIds()`
- ✅ Get mempool items `getAllMempoolItems()`
- ✅ Get mempool item `getMempoolItemByTxId(transaction_id)`

### Wallet

#### Key Management

- ✅ Specify as active `logIn(fingerprint)`
- ✅ Get wallet public key `getPublicKeys()`
- ✅ Get wallet private key `getPrivateKey()`
- ✅ Generate mnemonic `generateMnemonic()`
- ✅ Add keychain `addKey()`
- ✅ Delete the private key `deleteKey()`
- ✅ Delete all private keys `deleteAllKeys()`

#### Wallet Node

- ✅ Get wallet sync status `getSyncStatus()`
- ✅ Get the current height `getHeightInfo()`
- ✅ farm block `farmBlock()`
- ✅ Get the initial freezing period of the blockchain `getInitialFreezePeriod()`
- ✅ Get current network information `getNetworkInfo()`

#### Wallet Management

- ✅ Get list of wallets `getWallets()`
- 🚧 Create a new wallet `createNewWallet()`

#### Wallet

- ✅ Get wallet balance `getWalletBalance()`
- ✅ Get transaction records through `transaction hash` `getTransaction()`
- ✅ Get transaction records `getTransactions()`
- ✅ Get new address `getNextAddress()`
- ✅ Initiate transaction `sendTransaction()`
- ✅ Create backup `createBackup()`
- ✅ Get the number of wallet transactions `getTransactionCount()`
- ✅ Get farm reward information `getFarmedAmount()`
- 🚧 `createSignedTransaction()`

#### Offers
- ✅ Check Offer Validity `checkOfferValidity()`
- ✅ Get Offer Summary `getOfferSummary()`
- ✅ Get Offer `getOffer()`

#### NFT Wallet
- ✅ Create New NFT Wallet `createNewNftWallet()`
- ✅ All Uri to NFT `addUriToNft()`
- ✅ Get NFT Information `get_nft_info()`
- ✅ Transfer NFT `transferNft()`
- ✅ List NFTs `list_nfts()`
- ✅ Set NFT DID `setNftDid()`
- ✅ GMint NFT `mintNft()`

#### Other currencies and transactions 🚧
#### DID Wallet 🚧
#### RL Wallet 🚧

## Quick Start

### Install

``` php
composer require chinilla/chinilla-php
```

### Code Example

``` php
/* (Full Node) */
$fullNodeConfig = [
    'base_uri' => 'https://localhost:8555',
    'verify' => false,
    'cert' => '/your/private_full_node.crt/path',// private_full_node.crt
    'ssl_key' => '/your/private_full_node.key/path',// private_full_node.key
];

$api = new \Chinilla\Api(new \GuzzleHttp\Client($fullNodeConfig));
$fullNode = new \Chinilla\FullNode($api);
$info = $fullNode->getNetworkInfo();
// $info->network_name      vanillanet
// $info->network_prefix    hcx

/* (Wallet) */
$walletConfig = [
    'base_uri' => 'https://localhost:9256',
    'verify' => false,
    'cert' => '/your/private_wallet.crt/path',// private_wallet.crt
    'ssl_key' => '/your/private_wallet.key/path', // private_wallet.key
];

$api = new \Chinilla\Api(new \GuzzleHttp\Client($walletConfig));
$wallet = new \Chinilla\Wallet($api);
$info = $wallet->getNetworkInfo();
```
