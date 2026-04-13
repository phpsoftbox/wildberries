<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries;

enum WildberriesApiBasesEnum: string
{
    case Suppliers       = 'suppliers';
    case Marketplace     = 'marketplace';
    case Content         = 'content';
    case DiscountsPrices = 'discountsPrices';
    case Common          = 'common';
    case Feedbacks       = 'feedbacks';
    case UserManagement  = 'userManagement';
    case Supplies        = 'supplies';
    case Advert          = 'advert';
    case AdvertMedia     = 'advertMedia';
    case DpCalendar      = 'dpCalendar';
    case BuyerChat       = 'buyerChat';
    case Returns         = 'returns';
    case SellerAnalytics = 'sellerAnalytics';
    case Statistics      = 'statistics';
    case Documents       = 'documents';
    case Finance         = 'finance';

    /**
     * @return array<string, string>
     */
    public static function production(): array
    {
        $bases = [];

        foreach (self::cases() as $host) {
            $bases[$host->value] = $host->productionUrl();
        }

        return $bases;
    }

    /**
     * @return array<string, string>
     */
    public static function sandbox(): array
    {
        $bases = [];

        foreach (self::cases() as $host) {
            $baseUrl = $host->sandboxUrl();
            if ($baseUrl !== null) {
                $bases[$host->value] = $baseUrl;
            }
        }

        return $bases;
    }

    private function productionUrl(): string
    {
        return match ($this) {
            self::Suppliers       => 'https://suppliers-api.wildberries.ru',
            self::Marketplace     => 'https://marketplace-api.wildberries.ru',
            self::Content         => 'https://content-api.wildberries.ru',
            self::DiscountsPrices => 'https://discounts-prices-api.wildberries.ru',
            self::Common          => 'https://common-api.wildberries.ru',
            self::Feedbacks       => 'https://feedbacks-api.wildberries.ru',
            self::UserManagement  => 'https://user-management-api.wildberries.ru',
            self::Supplies        => 'https://supplies-api.wildberries.ru',
            self::Advert          => 'https://advert-api.wildberries.ru',
            self::AdvertMedia     => 'https://advert-media-api.wildberries.ru',
            self::DpCalendar      => 'https://dp-calendar-api.wildberries.ru',
            self::BuyerChat       => 'https://buyer-chat-api.wildberries.ru',
            self::Returns         => 'https://returns-api.wildberries.ru',
            self::SellerAnalytics => 'https://seller-analytics-api.wildberries.ru',
            self::Statistics      => 'https://statistics-api.wildberries.ru',
            self::Documents       => 'https://documents-api.wildberries.ru',
            self::Finance         => 'https://finance-api.wildberries.ru',
        };
    }

    private function sandboxUrl(): ?string
    {
        return match ($this) {
            self::Marketplace     => 'https://marketplace-api-sandbox.wildberries.ru',
            self::Content         => 'https://content-api-sandbox.wildberries.ru',
            self::DiscountsPrices => 'https://discounts-prices-api-sandbox.wildberries.ru',
            self::Supplies        => 'https://supplies-api-sandbox.wildberries.ru',
            self::Advert          => 'https://advert-api-sandbox.wildberries.ru',
            self::Feedbacks       => 'https://feedbacks-api-sandbox.wildberries.ru',
            self::Statistics      => 'https://statistics-api-sandbox.wildberries.ru',
            default               => null,
        };
    }
}
