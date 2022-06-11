<?php

namespace Chinilla\Interfaces;

use Chinilla\Types\Address;

interface WalletInterface
{
    // Key management
    public function logIn(int $fingerprint);
    public function getPublicKeys();
    public function getPrivateKey(int $fingerprint);
    public function generateMnemonic();
    public function addKey(array $mnemonic, string $type = 'new_wallet');
    public function deleteKey(int $fingerprint);
    public function deleteAllKeys();

    // Wallet node
    public function getSyncStatus();
    public function getHeightInfo();
    public function farmBlock(string $address);
    public function getInitialFreezePeriod();
    public function getNetworkInfo();
    
    // Wallet management
    public function getWallets();
    public function createNewWallet($params);

    // Wallet
    public function getWalletBalance(int $walletId);
    public function getTransaction(string $transactionId);
    public function getTransactions(int $walletId);
    public function getNextAddress(int $walletId, bool $newAddress = true): Address;
    public function sendTransaction($walletId, $address, $amount, $fee);
    public function createBackup($filePath);
    public function getTransactionCount(int $walletId);
    public function getFarmedAmount();
    public function createSignedTransaction();

    // CATs
    public function getCatList();
    public function catSetName($walletId);
    public function catGetName($walletId);
    public function getStrayCats();
    public function catSpend($walletId, $innerAddress, $memos, $amount, $fee);
    public function catGetAssetId($walletId);
    public function CatAssetIdToName($assetId);
    
    // Offers
    public function checkOfferValidity($offer);
    public function getOfferSummary($offer);
    public function getOffer($trade_id, $file_contents = false);

    // NFTs
    public function createNewNftWallet($did_id, $name = null);
    public function addUriToNft($wallet_id, $nft_coin_id, $key, $uri, $fee);
    public function get_nft_info($coin_id, $latest = true);
    public function transferNft($wallet_id, $nft_coin_id, $target_address, $fee);
    public function list_nfts($wallet_id);
    public function setNftDid($wallet_id, $did_id, $nft_coin_id, $fee);
    public function mintNft(
        $wallet_id,
        $royalty_address,
        $target_address,
        $hash,
        $uris,
        $meta_hash = "00",
        $meta_uris= [] ,
        $license_hash = "00",
        $license_uris = [],
        $series_total = 1,
        $series_number = 1,
        $fee = 0,
        $royalty_percentage = 0,
        $did_id = null
    );
}
