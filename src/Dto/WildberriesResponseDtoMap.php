<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Dto;

use PhpSoftBox\Wildberries\Dto\Analytics\Api\NmReport\GETApiV2NmReportDownloadsFileDownloadIdResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\NmReport\NmReportCreateReportResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\NmReport\NmReportGetReportsResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\NmReport\NmReportRetryReportResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\PostSalesFunnelGroupedHistoryResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\PostSalesFunnelProductsResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\PostV1StocksReportWbWarehousesResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\ProductHistoryResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport\POSTApiV2SearchReportProductOrdersResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport\POSTApiV2SearchReportProductSearchTextsResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport\POSTApiV2SearchReportReportResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport\POSTApiV2SearchReportTableDetailsResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport\POSTApiV2SearchReportTableGroupsResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport\POSTApiV2StocksReportOfficesResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport\POSTApiV2StocksReportProductsGroupsResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport\POSTApiV2StocksReportProductsProductsResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport\POSTApiV2StocksReportProductsSizesResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Claim\CommunicationsError400PatchClaim;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Claims\CommunicationsGetClaimsSuccessResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedback\GETApiV1FeedbackResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\Communications401;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\DELETEApiFeedbacksV1PinsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\GETApiFeedbacksV1PinsCountResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\GETApiFeedbacksV1PinsLimitsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\GETApiFeedbacksV1PinsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\GETApiV1FeedbacksArchiveResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\GETApiV1FeedbacksCountResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\GETApiV1FeedbacksCountUnansweredResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\GETApiV1FeedbacksResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\POSTApiFeedbacksV1PinsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\POSTApiV1FeedbacksOrderReturnResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\StandardizedFQError;
use PhpSoftBox\Wildberries\Dto\Communications\Api\NewFeedbacksQuestions\GETApiV1NewFeedbacksQuestionsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Question\GETApiV1QuestionResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Questions\GETApiV1QuestionsCountResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Questions\GETApiV1QuestionsCountUnansweredResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Questions\GETApiV1QuestionsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Questions\PATCHApiV1QuestionsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Seller\ChatsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Seller\EventsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Seller\GETApiV1SellerDownloadIdResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Seller\MessageResponse;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Account\GETApiV1AccountBalanceResponse;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Documents\GetCategories;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Documents\GetDoc;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Documents\GetDocs;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Documents\GetList;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Supplier\GETApiV5SupplierReportDetailByPeriodResponse;
use PhpSoftBox\Wildberries\Dto\General\Api\Common\SubscriptionsJamInfo;
use PhpSoftBox\Wildberries\Dto\General\Api\Common\SupplierRatingModel;
use PhpSoftBox\Wildberries\Dto\General\Api\Communications\GETApiCommunicationsV2NewsResponse;
use PhpSoftBox\Wildberries\Dto\General\Api\Invite\CreateInviteResponse;
use PhpSoftBox\Wildberries\Dto\General\Api\SellerInfo\GETApiV1SellerInfoResponse;
use PhpSoftBox\Wildberries\Dto\General\Api\Users\ErrorResponse;
use PhpSoftBox\Wildberries\Dto\General\Api\Users\GetUsersResponse;
use PhpSoftBox\Wildberries\Dto\General\Ping\GETPingResponse;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\ApiCheckedIdentity;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\ApiNewOrders;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\ApiOrderClientInfoResp;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\ApiOrders;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\ApiOrdersMeta;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\ApiOrderStatuses;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\InStorePickup401;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\Marketplace\ApiMetaSetResponses;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\Marketplace\ApiOrdersResponses;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\ApiOrderGroup;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\DbsOnlyClientInfoResp;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\GETApiV3DbsOrdersNewResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\GETApiV3DbsOrdersOrderIdMetaResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\GETApiV3DbsOrdersResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\POSTApiV3DbsOrdersStatusResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Marketplace\ApiB2bClientInfoResponses;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Marketplace\POSTApiMarketplaceV3DbsOrdersStatusReceiveResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Marketplace\POSTApiMarketplaceV3DbsOrdersStickersResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\GETApiV3DbwOrdersNewResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\GETApiV3DbwOrdersOrderIdMetaResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\GETApiV3DbwOrdersResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\OrderCourierInfoResp;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\POSTApiV3DbwOrdersStatusResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\POSTApiV3DbwOrdersStickersResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Marketplace\ClientInfoResp;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\V3OrdersMetaAPI;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\V3SupplyOrderIDsAPI;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\CrossborderTurkeyClientInfoResp;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\GETApiV3OrdersNewResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\GETApiV3OrdersResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\POSTApiV3OrdersStatusHistoryResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\POSTApiV3OrdersStatusResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\POSTApiV3OrdersStickersCrossBorderResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\POSTApiV3OrdersStickersResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Passes\GETApiV3PassesOfficesResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Passes\GETApiV3PassesResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Passes\OrdersFbs401;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Passes\POSTApiV3PassesResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\GETApiV3SuppliesOrdersReshipmentResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\GETApiV3SuppliesResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\GETApiV3SuppliesSupplyIdBarcodeResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\GETApiV3SuppliesSupplyIdTrbxResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\POSTApiV3SuppliesResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\POSTApiV3SuppliesSupplyIdTrbxResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\POSTApiV3SuppliesSupplyIdTrbxStickersResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\Supply;
use PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Acceptance\ModelsOptionsResultModel;
use PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Supplies\GETApiV1SuppliesIDGoodsResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Supplies\GETApiV1SuppliesIDPackageResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Supplies\ModelsSupplyDetails;
use PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Supplies\POSTApiV1SuppliesResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\TransitTariffs\GETApiV1TransitTariffsResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Warehouses\GETApiV1WarehousesResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Buffer\ProductsResponseGoodBufferHistories;
use PhpSoftBox\Wildberries\Dto\Products\Api\Buffer\ProductsResponseTaskBuffer;
use PhpSoftBox\Wildberries\Dto\Products\Api\Content\BrandsResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Dbw\GETApiV3DbwWarehousesWarehouseIdContactsResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\History\ProductsResponseGoodHistories;
use PhpSoftBox\Wildberries\Dto\Products\Api\History\ProductsResponseTaskHistory;
use PhpSoftBox\Wildberries\Dto\Products\Api\List\ProductsResponseGoodsLists;
use PhpSoftBox\Wildberries\Dto\Products\Api\List\ProductsResponseSizeLists;
use PhpSoftBox\Wildberries\Dto\Products\Api\Offices\GETApiV3OfficesResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Quarantine\ProductsResponseQuarantineGoods;
use PhpSoftBox\Wildberries\Dto\Products\Api\Stocks\POSTApiV3StocksWarehouseIdResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Upload\ProductsSuccessTaskResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Warehouses\GETApiV3WarehousesResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Warehouses\POSTApiV3WarehousesResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Warehouses\Products401;
use PhpSoftBox\Wildberries\Dto\Products\Content\Barcodes\POSTContentV2BarcodesResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Cards\GETContentV2CardsLimitsResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Cards\POSTContentV2CardsDeleteTrashResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Cards\POSTContentV2CardsRecoverResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Cards\ResponseCardCreate;
use PhpSoftBox\Wildberries\Dto\Products\Content\Cards\ResponsePublicViewerPublicErrorsTableListV2;
use PhpSoftBox\Wildberries\Dto\Products\Content\Directory\GETContentV2DirectoryColorsResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Directory\GETContentV2DirectoryCountriesResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Directory\GETContentV2DirectoryKindsResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Directory\GETContentV2DirectorySeasonsResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Directory\GETContentV2DirectoryTnvedResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Directory\GETContentV2DirectoryVatResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Get\POSTContentV2GetCardsListResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Get\POSTContentV2GetCardsTrashResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Media\POSTContentV3MediaFileResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Media\POSTContentV3MediaSaveResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Object\GETContentV2ObjectAllResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Object\GETContentV2ObjectCharcsSubjectIdResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Object\GETContentV2ObjectParentAllResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Tag\ResponseContentError;
use PhpSoftBox\Wildberries\Dto\Products\Content\Tags\GETContentV2TagsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Advert\GETAdvV1AdvertResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Adverts\GETAdvV1AdvertsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Auction\PATCHAdvV0AuctionNmsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Auction\Response400;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Balance\GETAdvV1BalanceResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Budget\GETAdvV1BudgetResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Budget\POSTAdvV1BudgetDepositResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Count\GETAdvV1CountResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Delete\ResponseAdvError1;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Fullstats\ResponseFullStats;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\GETAdvV1PromotionCountResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery\V0GetNormQueryBidsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery\V0GetNormQueryListResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery\V0GetNormQueryMinusResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery\V0GetNormQueryStatsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery\V1GetNormQueryStatsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Payments\GETAdvV1PaymentsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Rename\Promotion401;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Seacat\POSTAdvV2SeacatSaveAdResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Start\Dto400Response;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Stats\POSTAdvV1StatsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Supplier\GETAdvV1SupplierSubjectsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Supplier\POSTAdvV2SupplierNmsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Upd\GETAdvV1UpdResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert\GetAdverts;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert\PATCHApiAdvertV1BidsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert\POSTApiAdvertV1BidsMinResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert\V0BidsRecommendationsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Calendar\PromotionPromotionsGetByIDSuccessResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Calendar\PromotionPromotionsSuccessResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Calendar\PromotionResponsePromotionsGoodsLists;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Calendar\PromotionUploadSuccessResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\AcceptanceReport\GETApiV1AcceptanceReportTasksTaskIdDownloadResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\ExciseReportResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\GETApiV1AnalyticsBannedProductsBlockedResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\GETApiV1AnalyticsBannedProductsShadowedResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\GETApiV1AnalyticsGoodsReturnResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\MeasurementPenalties;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\ReportsSuccessBrandShareResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\ReportsSuccessBrandsResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\ReportsSuccessGoodsLabelingResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\ReportsSuccessParentsResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\ReportsSuccessRegionSaleResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\ReportsSuccessSubstIncorAttachResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\ReportsSuccessTaskResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\WHM;
use PhpSoftBox\Wildberries\Dto\Reports\Api\PaidStorage\ResponsePaidStorage;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Supplier\GETApiV1SupplierOrdersResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Supplier\GETApiV1SupplierSalesResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Supplier\GETApiV1SupplierStocksResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\WarehouseRemains\CreateTaskResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\WarehouseRemains\GETApiV1WarehouseRemainsTasksTaskIdDownloadResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\WarehouseRemains\GetTasksResponse;
use PhpSoftBox\Wildberries\Dto\Tariffs\Api\GETApiTariffsV1AcceptanceCoefficientsResponse;
use PhpSoftBox\Wildberries\Dto\Tariffs\Api\GETApiV1TariffsCommissionResponse;
use PhpSoftBox\Wildberries\Dto\Tariffs\Api\ReturnTariffsResponse;
use PhpSoftBox\Wildberries\Dto\Tariffs\Api\TariffsBoxResponse;
use PhpSoftBox\Wildberries\Dto\Tariffs\Api\TariffsPalletResponse;

use function preg_match;
use function preg_quote;
use function preg_replace;
use function strtoupper;
use function trim;

final class WildberriesResponseDtoMap
{
    /**
     * @var array<string, class-string<WildberriesDtoInterface>>
     */
    private const MAP = [
        'DELETE /adv/v0/normquery/bids'                                     => Response400::class,
        'DELETE /api/feedbacks/v1/pins'                                     => DELETEApiFeedbacksV1PinsResponse::class,
        'DELETE /api/v1/user'                                               => ErrorResponse::class,
        'DELETE /api/v3/click-collect/orders/{orderId}/meta'                => InStorePickup401::class,
        'DELETE /api/v3/dbs/orders/{orderId}/meta'                          => OrdersDbs\Api\Dbs\Error::class,
        'DELETE /api/v3/dbw/orders/{orderId}/meta'                          => OrdersDbw\Api\Dbw\Error::class,
        'DELETE /api/v3/orders/{orderId}/meta'                              => OrdersFbs\Api\Passes\Error::class,
        'DELETE /api/v3/passes/{passId}'                                    => OrdersFbs401::class,
        'DELETE /api/v3/stocks/{warehouseId}'                               => Products\Api\Stocks\Error::class,
        'DELETE /api/v3/supplies/{supplyId}'                                => OrdersFbs\Api\Passes\Error::class,
        'DELETE /api/v3/supplies/{supplyId}/trbx'                           => OrdersFbs\Api\Passes\Error::class,
        'DELETE /api/v3/warehouses/{warehouseId}'                           => Products401::class,
        'DELETE /content/v2/tag/{id}'                                       => ResponseContentError::class,
        'GET /adv/v0/delete'                                                => ResponseAdvError1::class,
        'GET /adv/v0/pause'                                                 => Dto400Response::class,
        'GET /adv/v0/start'                                                 => Dto400Response::class,
        'GET /adv/v0/stop'                                                  => Dto400Response::class,
        'GET /adv/v1/advert'                                                => GETAdvV1AdvertResponse::class,
        'GET /adv/v1/adverts'                                               => GETAdvV1AdvertsResponse::class,
        'GET /adv/v1/balance'                                               => GETAdvV1BalanceResponse::class,
        'GET /adv/v1/budget'                                                => GETAdvV1BudgetResponse::class,
        'GET /adv/v1/count'                                                 => GETAdvV1CountResponse::class,
        'GET /adv/v1/payments'                                              => GETAdvV1PaymentsResponse::class,
        'GET /adv/v1/promotion/count'                                       => GETAdvV1PromotionCountResponse::class,
        'GET /adv/v1/supplier/subjects'                                     => GETAdvV1SupplierSubjectsResponse::class,
        'GET /adv/v1/upd'                                                   => GETAdvV1UpdResponse::class,
        'GET /adv/v3/fullstats'                                             => ResponseFullStats::class,
        'GET /api/advert/v0/bids/recommendations'                           => V0BidsRecommendationsResponse::class,
        'GET /api/advert/v2/adverts'                                        => GetAdverts::class,
        'GET /api/analytics/v1/deductions'                                  => ReportsSuccessSubstIncorAttachResponse::class,
        'GET /api/analytics/v1/measurement-penalties'                       => MeasurementPenalties::class,
        'GET /api/analytics/v1/warehouse-measurements'                      => WHM::class,
        'GET /api/common/v1/rating'                                         => SupplierRatingModel::class,
        'GET /api/common/v1/subscriptions'                                  => SubscriptionsJamInfo::class,
        'GET /api/communications/v2/news'                                   => GETApiCommunicationsV2NewsResponse::class,
        'GET /api/content/v1/brands'                                        => BrandsResponse::class,
        'GET /api/feedbacks/v1/pins'                                        => GETApiFeedbacksV1PinsResponse::class,
        'GET /api/feedbacks/v1/pins/count'                                  => GETApiFeedbacksV1PinsCountResponse::class,
        'GET /api/feedbacks/v1/pins/limits'                                 => GETApiFeedbacksV1PinsLimitsResponse::class,
        'GET /api/marketplace/v3/supplies/{supplyId}/order-ids'             => V3SupplyOrderIDsAPI::class,
        'GET /api/tariffs/v1/acceptance/coefficients'                       => GETApiTariffsV1AcceptanceCoefficientsResponse::class,
        'GET /api/v1/acceptance_report'                                     => CreateTaskResponse::class,
        'GET /api/v1/acceptance_report/tasks/{task_id}/download'            => GETApiV1AcceptanceReportTasksTaskIdDownloadResponse::class,
        'GET /api/v1/acceptance_report/tasks/{task_id}/status'              => GetTasksResponse::class,
        'GET /api/v1/account/balance'                                       => GETApiV1AccountBalanceResponse::class,
        'GET /api/v1/analytics/antifraud-details'                           => ReportsSuccessTaskResponse::class,
        'GET /api/v1/analytics/banned-products/blocked'                     => GETApiV1AnalyticsBannedProductsBlockedResponse::class,
        'GET /api/v1/analytics/banned-products/shadowed'                    => GETApiV1AnalyticsBannedProductsShadowedResponse::class,
        'GET /api/v1/analytics/brand-share'                                 => ReportsSuccessBrandShareResponse::class,
        'GET /api/v1/analytics/brand-share/brands'                          => ReportsSuccessBrandsResponse::class,
        'GET /api/v1/analytics/brand-share/parent-subjects'                 => ReportsSuccessParentsResponse::class,
        'GET /api/v1/analytics/goods-labeling'                              => ReportsSuccessGoodsLabelingResponse::class,
        'GET /api/v1/analytics/goods-return'                                => GETApiV1AnalyticsGoodsReturnResponse::class,
        'GET /api/v1/analytics/region-sale'                                 => ReportsSuccessRegionSaleResponse::class,
        'GET /api/v1/calendar/promotions'                                   => PromotionPromotionsSuccessResponse::class,
        'GET /api/v1/calendar/promotions/details'                           => PromotionPromotionsGetByIDSuccessResponse::class,
        'GET /api/v1/calendar/promotions/nomenclatures'                     => PromotionResponsePromotionsGoodsLists::class,
        'GET /api/v1/claims'                                                => CommunicationsGetClaimsSuccessResponse::class,
        'GET /api/v1/documents/categories'                                  => GetCategories::class,
        'GET /api/v1/documents/download'                                    => GetDoc::class,
        'GET /api/v1/documents/list'                                        => GetList::class,
        'GET /api/v1/feedback'                                              => GETApiV1FeedbackResponse::class,
        'GET /api/v1/feedbacks'                                             => GETApiV1FeedbacksResponse::class,
        'GET /api/v1/feedbacks/archive'                                     => GETApiV1FeedbacksArchiveResponse::class,
        'GET /api/v1/feedbacks/count'                                       => GETApiV1FeedbacksCountResponse::class,
        'GET /api/v1/feedbacks/count-unanswered'                            => GETApiV1FeedbacksCountUnansweredResponse::class,
        'GET /api/v1/new-feedbacks-questions'                               => GETApiV1NewFeedbacksQuestionsResponse::class,
        'GET /api/v1/paid_storage'                                          => CreateTaskResponse::class,
        'GET /api/v1/paid_storage/tasks/{task_id}/download'                 => ResponsePaidStorage::class,
        'GET /api/v1/paid_storage/tasks/{task_id}/status'                   => GetTasksResponse::class,
        'GET /api/v1/question'                                              => GETApiV1QuestionResponse::class,
        'GET /api/v1/questions'                                             => GETApiV1QuestionsResponse::class,
        'GET /api/v1/questions/count'                                       => GETApiV1QuestionsCountResponse::class,
        'GET /api/v1/questions/count-unanswered'                            => GETApiV1QuestionsCountUnansweredResponse::class,
        'GET /api/v1/seller-info'                                           => GETApiV1SellerInfoResponse::class,
        'GET /api/v1/seller/chats'                                          => ChatsResponse::class,
        'GET /api/v1/seller/download/{id}'                                  => GETApiV1SellerDownloadIdResponse::class,
        'GET /api/v1/seller/events'                                         => EventsResponse::class,
        'GET /api/v1/supplier/orders'                                       => GETApiV1SupplierOrdersResponse::class,
        'GET /api/v1/supplier/sales'                                        => GETApiV1SupplierSalesResponse::class,
        'GET /api/v1/supplier/stocks'                                       => GETApiV1SupplierStocksResponse::class,
        'GET /api/v1/supplies/{ID}'                                         => ModelsSupplyDetails::class,
        'GET /api/v1/supplies/{ID}/goods'                                   => GETApiV1SuppliesIDGoodsResponse::class,
        'GET /api/v1/supplies/{ID}/package'                                 => GETApiV1SuppliesIDPackageResponse::class,
        'GET /api/v1/tariffs/box'                                           => TariffsBoxResponse::class,
        'GET /api/v1/tariffs/commission'                                    => GETApiV1TariffsCommissionResponse::class,
        'GET /api/v1/tariffs/pallet'                                        => TariffsPalletResponse::class,
        'GET /api/v1/tariffs/return'                                        => ReturnTariffsResponse::class,
        'GET /api/v1/transit-tariffs'                                       => GETApiV1TransitTariffsResponse::class,
        'GET /api/v1/users'                                                 => GetUsersResponse::class,
        'GET /api/v1/warehouse_remains'                                     => CreateTaskResponse::class,
        'GET /api/v1/warehouse_remains/tasks/{task_id}/download'            => GETApiV1WarehouseRemainsTasksTaskIdDownloadResponse::class,
        'GET /api/v1/warehouse_remains/tasks/{task_id}/status'              => GetTasksResponse::class,
        'GET /api/v1/warehouses'                                            => GETApiV1WarehousesResponse::class,
        'GET /api/v2/buffer/goods/task'                                     => ProductsResponseGoodBufferHistories::class,
        'GET /api/v2/buffer/tasks'                                          => ProductsResponseTaskBuffer::class,
        'GET /api/v2/history/goods/task'                                    => ProductsResponseGoodHistories::class,
        'GET /api/v2/history/tasks'                                         => ProductsResponseTaskHistory::class,
        'GET /api/v2/list/goods/filter'                                     => ProductsResponseGoodsLists::class,
        'GET /api/v2/list/goods/size/nm'                                    => ProductsResponseSizeLists::class,
        'GET /api/v2/nm-report/downloads'                                   => NmReportGetReportsResponse::class,
        'GET /api/v2/nm-report/downloads/file/{downloadId}'                 => GETApiV2NmReportDownloadsFileDownloadIdResponse::class,
        'GET /api/v2/quarantine/goods'                                      => ProductsResponseQuarantineGoods::class,
        'GET /api/v3/click-collect/orders'                                  => ApiOrders::class,
        'GET /api/v3/click-collect/orders/new'                              => ApiNewOrders::class,
        'GET /api/v3/click-collect/orders/{orderId}/meta'                   => ApiOrdersMeta::class,
        'GET /api/v3/dbs/orders'                                            => GETApiV3DbsOrdersResponse::class,
        'GET /api/v3/dbs/orders/new'                                        => GETApiV3DbsOrdersNewResponse::class,
        'GET /api/v3/dbs/orders/{orderId}/meta'                             => GETApiV3DbsOrdersOrderIdMetaResponse::class,
        'GET /api/v3/dbw/orders'                                            => GETApiV3DbwOrdersResponse::class,
        'GET /api/v3/dbw/orders/new'                                        => GETApiV3DbwOrdersNewResponse::class,
        'GET /api/v3/dbw/orders/{orderId}/meta'                             => GETApiV3DbwOrdersOrderIdMetaResponse::class,
        'GET /api/v3/dbw/warehouses/{warehouseId}/contacts'                 => GETApiV3DbwWarehousesWarehouseIdContactsResponse::class,
        'GET /api/v3/offices'                                               => GETApiV3OfficesResponse::class,
        'GET /api/v3/orders'                                                => GETApiV3OrdersResponse::class,
        'GET /api/v3/orders/new'                                            => GETApiV3OrdersNewResponse::class,
        'GET /api/v3/passes'                                                => GETApiV3PassesResponse::class,
        'GET /api/v3/passes/offices'                                        => GETApiV3PassesOfficesResponse::class,
        'GET /api/v3/supplies'                                              => GETApiV3SuppliesResponse::class,
        'GET /api/v3/supplies/orders/reshipment'                            => GETApiV3SuppliesOrdersReshipmentResponse::class,
        'GET /api/v3/supplies/{supplyId}'                                   => Supply::class,
        'GET /api/v3/supplies/{supplyId}/barcode'                           => GETApiV3SuppliesSupplyIdBarcodeResponse::class,
        'GET /api/v3/supplies/{supplyId}/trbx'                              => GETApiV3SuppliesSupplyIdTrbxResponse::class,
        'GET /api/v3/warehouses'                                            => GETApiV3WarehousesResponse::class,
        'GET /api/v5/supplier/reportDetailByPeriod'                         => GETApiV5SupplierReportDetailByPeriodResponse::class,
        'GET /content/v2/cards/limits'                                      => GETContentV2CardsLimitsResponse::class,
        'GET /content/v2/directory/colors'                                  => GETContentV2DirectoryColorsResponse::class,
        'GET /content/v2/directory/countries'                               => GETContentV2DirectoryCountriesResponse::class,
        'GET /content/v2/directory/kinds'                                   => GETContentV2DirectoryKindsResponse::class,
        'GET /content/v2/directory/seasons'                                 => GETContentV2DirectorySeasonsResponse::class,
        'GET /content/v2/directory/tnved'                                   => GETContentV2DirectoryTnvedResponse::class,
        'GET /content/v2/directory/vat'                                     => GETContentV2DirectoryVatResponse::class,
        'GET /content/v2/object/all'                                        => GETContentV2ObjectAllResponse::class,
        'GET /content/v2/object/charcs/{subjectId}'                         => GETContentV2ObjectCharcsSubjectIdResponse::class,
        'GET /content/v2/object/parent/all'                                 => GETContentV2ObjectParentAllResponse::class,
        'GET /content/v2/tags'                                              => GETContentV2TagsResponse::class,
        'GET /ping'                                                         => GETPingResponse::class,
        'PATCH /adv/v0/auction/nms'                                         => PATCHAdvV0AuctionNmsResponse::class,
        'PATCH /api/advert/v1/bids'                                         => PATCHApiAdvertV1BidsResponse::class,
        'PATCH /api/marketplace/v3/supplies/{supplyId}/orders'              => OrdersFbs\Api\Passes\Error::class,
        'PATCH /api/v1/claim'                                               => CommunicationsError400PatchClaim::class,
        'PATCH /api/v1/feedbacks/answer'                                    => Communications401::class,
        'PATCH /api/v1/questions'                                           => PATCHApiV1QuestionsResponse::class,
        'PATCH /api/v3/click-collect/orders/{orderId}/cancel'               => InStorePickup\Api\ClickCollect\Error::class,
        'PATCH /api/v3/click-collect/orders/{orderId}/confirm'              => InStorePickup\Api\ClickCollect\Error::class,
        'PATCH /api/v3/click-collect/orders/{orderId}/prepare'              => InStorePickup\Api\ClickCollect\Error::class,
        'PATCH /api/v3/click-collect/orders/{orderId}/receive'              => InStorePickup\Api\ClickCollect\Error::class,
        'PATCH /api/v3/click-collect/orders/{orderId}/reject'               => InStorePickup\Api\ClickCollect\Error::class,
        'PATCH /api/v3/dbs/orders/{orderId}/cancel'                         => OrdersDbs\Api\Dbs\Error::class,
        'PATCH /api/v3/dbs/orders/{orderId}/confirm'                        => OrdersDbs\Api\Dbs\Error::class,
        'PATCH /api/v3/dbs/orders/{orderId}/deliver'                        => OrdersDbs\Api\Dbs\Error::class,
        'PATCH /api/v3/dbs/orders/{orderId}/receive'                        => OrdersDbs\Api\Dbs\Error::class,
        'PATCH /api/v3/dbs/orders/{orderId}/reject'                         => OrdersDbs\Api\Dbs\Error::class,
        'PATCH /api/v3/dbw/orders/{orderId}/assemble'                       => OrdersDbw\Api\Dbw\Error::class,
        'PATCH /api/v3/dbw/orders/{orderId}/cancel'                         => OrdersDbw\Api\Dbw\Error::class,
        'PATCH /api/v3/dbw/orders/{orderId}/confirm'                        => OrdersDbw\Api\Dbw\Error::class,
        'PATCH /api/v3/orders/{orderId}/cancel'                             => OrdersFbs\Api\Passes\Error::class,
        'PATCH /api/v3/supplies/{supplyId}/deliver'                         => OrdersFbs\Api\Passes\Error::class,
        'PATCH /content/v2/tag/{id}'                                        => ResponseContentError::class,
        'POST /adv/v0/normquery/bids'                                       => Response400::class,
        'POST /adv/v0/normquery/get-bids'                                   => V0GetNormQueryBidsResponse::class,
        'POST /adv/v0/normquery/get-minus'                                  => V0GetNormQueryMinusResponse::class,
        'POST /adv/v0/normquery/list'                                       => V0GetNormQueryListResponse::class,
        'POST /adv/v0/normquery/set-minus'                                  => Response400::class,
        'POST /adv/v0/normquery/stats'                                      => V0GetNormQueryStatsResponse::class,
        'POST /adv/v0/rename'                                               => Promotion401::class,
        'POST /adv/v1/budget/deposit'                                       => POSTAdvV1BudgetDepositResponse::class,
        'POST /adv/v1/normquery/stats'                                      => V1GetNormQueryStatsResponse::class,
        'POST /adv/v1/stats'                                                => POSTAdvV1StatsResponse::class,
        'POST /adv/v2/seacat/save-ad'                                       => POSTAdvV2SeacatSaveAdResponse::class,
        'POST /adv/v2/supplier/nms'                                         => POSTAdvV2SupplierNmsResponse::class,
        'POST /api/advert/v1/bids/min'                                      => POSTApiAdvertV1BidsMinResponse::class,
        'POST /api/analytics/v1/stocks-report/wb-warehouses'                => PostV1StocksReportWbWarehousesResponse::class,
        'POST /api/analytics/v3/sales-funnel/grouped/history'               => PostSalesFunnelGroupedHistoryResponse::class,
        'POST /api/analytics/v3/sales-funnel/products'                      => PostSalesFunnelProductsResponse::class,
        'POST /api/analytics/v3/sales-funnel/products/history'              => ProductHistoryResponse::class,
        'POST /api/feedbacks/v1/pins'                                       => POSTApiFeedbacksV1PinsResponse::class,
        'POST /api/marketplace/v3/click-collect/orders/meta/delete'         => ApiOrdersResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/meta/gtin'           => ApiMetaSetResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/meta/imei'           => ApiMetaSetResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/meta/info'           => InStorePickup\Api\Marketplace\ApiOrdersMetaResponse::class,
        'POST /api/marketplace/v3/click-collect/orders/meta/sgtin'          => ApiMetaSetResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/meta/uin'            => ApiMetaSetResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/status/cancel'       => InStorePickup\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/status/confirm'      => InStorePickup\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/status/info'         => InStorePickup\Api\Marketplace\ApiOrderStatusesV2::class,
        'POST /api/marketplace/v3/click-collect/orders/status/prepare'      => InStorePickup\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/status/receive'      => InStorePickup\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/status/reject'       => InStorePickup\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/b2b/info'                      => ApiB2bClientInfoResponses::class,
        'POST /api/marketplace/v3/dbs/orders/meta/customs-declaration'      => OrdersDbs\Api\Dbs\Error::class,
        'POST /api/marketplace/v3/dbs/orders/meta/delete'                   => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/meta/gtin'                     => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/meta/imei'                     => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/meta/info'                     => OrdersDbs\Api\Marketplace\ApiOrdersMetaResponse::class,
        'POST /api/marketplace/v3/dbs/orders/meta/sgtin'                    => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/meta/uin'                      => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/status/cancel'                 => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/status/confirm'                => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/status/deliver'                => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/status/info'                   => OrdersDbs\Api\Marketplace\ApiOrderStatusesV2::class,
        'POST /api/marketplace/v3/dbs/orders/status/receive'                => POSTApiMarketplaceV3DbsOrdersStatusReceiveResponse::class,
        'POST /api/marketplace/v3/dbs/orders/status/reject'                 => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/stickers'                      => POSTApiMarketplaceV3DbsOrdersStickersResponse::class,
        'POST /api/marketplace/v3/dbw/orders/client'                        => ClientInfoResp::class,
        'POST /api/marketplace/v3/orders/meta'                              => V3OrdersMetaAPI::class,
        'POST /api/v1/acceptance/options'                                   => ModelsOptionsResultModel::class,
        'POST /api/v1/analytics/excise-report'                              => ExciseReportResponse::class,
        'POST /api/v1/calendar/promotions/upload'                           => PromotionUploadSuccessResponse::class,
        'POST /api/v1/documents/download/all'                               => GetDocs::class,
        'POST /api/v1/feedbacks/answer'                                     => StandardizedFQError::class,
        'POST /api/v1/feedbacks/order/return'                               => POSTApiV1FeedbacksOrderReturnResponse::class,
        'POST /api/v1/invite'                                               => CreateInviteResponse::class,
        'POST /api/v1/seller/message'                                       => MessageResponse::class,
        'POST /api/v1/supplies'                                             => POSTApiV1SuppliesResponse::class,
        'POST /api/v2/list/goods/filter'                                    => ProductsResponseGoodsLists::class,
        'POST /api/v2/nm-report/downloads'                                  => NmReportCreateReportResponse::class,
        'POST /api/v2/nm-report/downloads/retry'                            => NmReportRetryReportResponse::class,
        'POST /api/v2/search-report/product/orders'                         => POSTApiV2SearchReportProductOrdersResponse::class,
        'POST /api/v2/search-report/product/search-texts'                   => POSTApiV2SearchReportProductSearchTextsResponse::class,
        'POST /api/v2/search-report/report'                                 => POSTApiV2SearchReportReportResponse::class,
        'POST /api/v2/search-report/table/details'                          => POSTApiV2SearchReportTableDetailsResponse::class,
        'POST /api/v2/search-report/table/groups'                           => POSTApiV2SearchReportTableGroupsResponse::class,
        'POST /api/v2/stocks-report/offices'                                => POSTApiV2StocksReportOfficesResponse::class,
        'POST /api/v2/stocks-report/products/groups'                        => POSTApiV2StocksReportProductsGroupsResponse::class,
        'POST /api/v2/stocks-report/products/products'                      => POSTApiV2StocksReportProductsProductsResponse::class,
        'POST /api/v2/stocks-report/products/sizes'                         => POSTApiV2StocksReportProductsSizesResponse::class,
        'POST /api/v2/upload/task'                                          => ProductsSuccessTaskResponse::class,
        'POST /api/v2/upload/task/club-discount'                            => ProductsSuccessTaskResponse::class,
        'POST /api/v2/upload/task/size'                                     => ProductsSuccessTaskResponse::class,
        'POST /api/v3/click-collect/orders/client'                          => ApiOrderClientInfoResp::class,
        'POST /api/v3/click-collect/orders/client/identity'                 => ApiCheckedIdentity::class,
        'POST /api/v3/click-collect/orders/status'                          => ApiOrderStatuses::class,
        'POST /api/v3/dbs/groups/info'                                      => ApiOrderGroup::class,
        'POST /api/v3/dbs/orders/client'                                    => DbsOnlyClientInfoResp::class,
        'POST /api/v3/dbs/orders/delivery-date'                             => OrdersDbs\Api\Dbs\DeliveryDatesInfoResp::class,
        'POST /api/v3/dbs/orders/status'                                    => POSTApiV3DbsOrdersStatusResponse::class,
        'POST /api/v3/dbw/orders/courier'                                   => OrderCourierInfoResp::class,
        'POST /api/v3/dbw/orders/delivery-date'                             => OrdersDbw\Api\Dbw\DeliveryDatesInfoResp::class,
        'POST /api/v3/dbw/orders/status'                                    => POSTApiV3DbwOrdersStatusResponse::class,
        'POST /api/v3/dbw/orders/stickers'                                  => POSTApiV3DbwOrdersStickersResponse::class,
        'POST /api/v3/orders/client'                                        => CrossborderTurkeyClientInfoResp::class,
        'POST /api/v3/orders/status'                                        => POSTApiV3OrdersStatusResponse::class,
        'POST /api/v3/orders/status/history'                                => POSTApiV3OrdersStatusHistoryResponse::class,
        'POST /api/v3/orders/stickers'                                      => POSTApiV3OrdersStickersResponse::class,
        'POST /api/v3/orders/stickers/cross-border'                         => POSTApiV3OrdersStickersCrossBorderResponse::class,
        'POST /api/v3/passes'                                               => POSTApiV3PassesResponse::class,
        'POST /api/v3/stocks/{warehouseId}'                                 => POSTApiV3StocksWarehouseIdResponse::class,
        'POST /api/v3/supplies'                                             => POSTApiV3SuppliesResponse::class,
        'POST /api/v3/supplies/{supplyId}/trbx'                             => POSTApiV3SuppliesSupplyIdTrbxResponse::class,
        'POST /api/v3/supplies/{supplyId}/trbx/stickers'                    => POSTApiV3SuppliesSupplyIdTrbxStickersResponse::class,
        'POST /api/v3/warehouses'                                           => POSTApiV3WarehousesResponse::class,
        'POST /content/v2/barcodes'                                         => POSTContentV2BarcodesResponse::class,
        'POST /content/v2/cards/delete/trash'                               => POSTContentV2CardsDeleteTrashResponse::class,
        'POST /content/v2/cards/error/list'                                 => ResponsePublicViewerPublicErrorsTableListV2::class,
        'POST /content/v2/cards/moveNm'                                     => ResponseCardCreate::class,
        'POST /content/v2/cards/recover'                                    => POSTContentV2CardsRecoverResponse::class,
        'POST /content/v2/cards/update'                                     => ResponseCardCreate::class,
        'POST /content/v2/cards/upload'                                     => ResponseCardCreate::class,
        'POST /content/v2/cards/upload/add'                                 => ResponseCardCreate::class,
        'POST /content/v2/get/cards/list'                                   => POSTContentV2GetCardsListResponse::class,
        'POST /content/v2/get/cards/trash'                                  => POSTContentV2GetCardsTrashResponse::class,
        'POST /content/v2/tag'                                              => ResponseContentError::class,
        'POST /content/v2/tag/nomenclature/link'                            => ResponseContentError::class,
        'POST /content/v3/media/file'                                       => POSTContentV3MediaFileResponse::class,
        'POST /content/v3/media/save'                                       => POSTContentV3MediaSaveResponse::class,
        'PUT /adv/v0/auction/placements'                                    => Response400::class,
        'PUT /api/marketplace/v3/orders/{orderId}/meta/customs-declaration' => OrdersFbs\Api\Passes\Error::class,
        'PUT /api/v1/users/access'                                          => ErrorResponse::class,
        'PUT /api/v3/click-collect/orders/{orderId}/meta/gtin'              => InStorePickup\Api\ClickCollect\Error::class,
        'PUT /api/v3/click-collect/orders/{orderId}/meta/imei'              => InStorePickup\Api\ClickCollect\Error::class,
        'PUT /api/v3/click-collect/orders/{orderId}/meta/sgtin'             => InStorePickup\Api\ClickCollect\Error::class,
        'PUT /api/v3/click-collect/orders/{orderId}/meta/uin'               => InStorePickup\Api\ClickCollect\Error::class,
        'PUT /api/v3/dbs/orders/{orderId}/meta/gtin'                        => OrdersDbs\Api\Dbs\Error::class,
        'PUT /api/v3/dbs/orders/{orderId}/meta/imei'                        => OrdersDbs\Api\Dbs\Error::class,
        'PUT /api/v3/dbs/orders/{orderId}/meta/sgtin'                       => OrdersDbs\Api\Dbs\Error::class,
        'PUT /api/v3/dbs/orders/{orderId}/meta/uin'                         => OrdersDbs\Api\Dbs\Error::class,
        'PUT /api/v3/dbw/orders/{orderId}/meta/gtin'                        => OrdersDbw\Api\Dbw\Error::class,
        'PUT /api/v3/dbw/orders/{orderId}/meta/imei'                        => OrdersDbw\Api\Dbw\Error::class,
        'PUT /api/v3/dbw/orders/{orderId}/meta/sgtin'                       => OrdersDbw\Api\Dbw\Error::class,
        'PUT /api/v3/dbw/orders/{orderId}/meta/uin'                         => OrdersDbw\Api\Dbw\Error::class,
        'PUT /api/v3/dbw/warehouses/{warehouseId}/contacts'                 => Products\Api\Stocks\Error::class,
        'PUT /api/v3/orders/{orderId}/meta/expiration'                      => OrdersFbs\Api\Passes\Error::class,
        'PUT /api/v3/orders/{orderId}/meta/gtin'                            => OrdersFbs\Api\Passes\Error::class,
        'PUT /api/v3/orders/{orderId}/meta/imei'                            => OrdersFbs\Api\Passes\Error::class,
        'PUT /api/v3/orders/{orderId}/meta/sgtin'                           => OrdersFbs\Api\Passes\Error::class,
        'PUT /api/v3/orders/{orderId}/meta/uin'                             => OrdersFbs\Api\Passes\Error::class,
        'PUT /api/v3/passes/{passId}'                                       => OrdersFbs\Api\Passes\Error::class,
        'PUT /api/v3/stocks/{warehouseId}'                                  => Products\Api\Stocks\Error::class,
        'PUT /api/v3/warehouses/{warehouseId}'                              => Products\Api\Stocks\Error::class,
    ];

    /**
     * @var array<string, class-string<WildberriesDtoInterface>>
     */
    private const PATTERN_MAP = [
        '~^DELETE /api/v3/click\\-collect/orders/[^/]+/meta$~'                => InStorePickup401::class,
        '~^DELETE /api/v3/dbs/orders/[^/]+/meta$~'                            => OrdersDbs\Api\Dbs\Error::class,
        '~^DELETE /api/v3/dbw/orders/[^/]+/meta$~'                            => OrdersDbw\Api\Dbw\Error::class,
        '~^DELETE /api/v3/orders/[^/]+/meta$~'                                => OrdersFbs\Api\Passes\Error::class,
        '~^DELETE /api/v3/passes/[^/]+$~'                                     => OrdersFbs401::class,
        '~^DELETE /api/v3/stocks/[^/]+$~'                                     => Products\Api\Stocks\Error::class,
        '~^DELETE /api/v3/supplies/[^/]+$~'                                   => OrdersFbs\Api\Passes\Error::class,
        '~^DELETE /api/v3/supplies/[^/]+/trbx$~'                              => OrdersFbs\Api\Passes\Error::class,
        '~^DELETE /api/v3/warehouses/[^/]+$~'                                 => Products401::class,
        '~^DELETE /content/v2/tag/[^/]+$~'                                    => ResponseContentError::class,
        '~^GET /api/marketplace/v3/supplies/[^/]+/order\\-ids$~'              => V3SupplyOrderIDsAPI::class,
        '~^GET /api/v1/acceptance_report/tasks/[^/]+/download$~'              => GETApiV1AcceptanceReportTasksTaskIdDownloadResponse::class,
        '~^GET /api/v1/acceptance_report/tasks/[^/]+/status$~'                => GetTasksResponse::class,
        '~^GET /api/v1/paid_storage/tasks/[^/]+/download$~'                   => ResponsePaidStorage::class,
        '~^GET /api/v1/paid_storage/tasks/[^/]+/status$~'                     => GetTasksResponse::class,
        '~^GET /api/v1/seller/download/[^/]+$~'                               => GETApiV1SellerDownloadIdResponse::class,
        '~^GET /api/v1/supplies/[^/]+$~'                                      => ModelsSupplyDetails::class,
        '~^GET /api/v1/supplies/[^/]+/goods$~'                                => GETApiV1SuppliesIDGoodsResponse::class,
        '~^GET /api/v1/supplies/[^/]+/package$~'                              => GETApiV1SuppliesIDPackageResponse::class,
        '~^GET /api/v1/warehouse_remains/tasks/[^/]+/download$~'              => GETApiV1WarehouseRemainsTasksTaskIdDownloadResponse::class,
        '~^GET /api/v1/warehouse_remains/tasks/[^/]+/status$~'                => GetTasksResponse::class,
        '~^GET /api/v2/nm\\-report/downloads/file/[^/]+$~'                    => GETApiV2NmReportDownloadsFileDownloadIdResponse::class,
        '~^GET /api/v3/click\\-collect/orders/[^/]+/meta$~'                   => ApiOrdersMeta::class,
        '~^GET /api/v3/dbs/orders/[^/]+/meta$~'                               => GETApiV3DbsOrdersOrderIdMetaResponse::class,
        '~^GET /api/v3/dbw/orders/[^/]+/meta$~'                               => GETApiV3DbwOrdersOrderIdMetaResponse::class,
        '~^GET /api/v3/dbw/warehouses/[^/]+/contacts$~'                       => GETApiV3DbwWarehousesWarehouseIdContactsResponse::class,
        '~^GET /api/v3/supplies/[^/]+$~'                                      => Supply::class,
        '~^GET /api/v3/supplies/[^/]+/barcode$~'                              => GETApiV3SuppliesSupplyIdBarcodeResponse::class,
        '~^GET /api/v3/supplies/[^/]+/trbx$~'                                 => GETApiV3SuppliesSupplyIdTrbxResponse::class,
        '~^GET /content/v2/object/charcs/[^/]+$~'                             => GETContentV2ObjectCharcsSubjectIdResponse::class,
        '~^PATCH /api/marketplace/v3/supplies/[^/]+/orders$~'                 => OrdersFbs\Api\Passes\Error::class,
        '~^PATCH /api/v3/click\\-collect/orders/[^/]+/cancel$~'               => InStorePickup\Api\ClickCollect\Error::class,
        '~^PATCH /api/v3/click\\-collect/orders/[^/]+/confirm$~'              => InStorePickup\Api\ClickCollect\Error::class,
        '~^PATCH /api/v3/click\\-collect/orders/[^/]+/prepare$~'              => InStorePickup\Api\ClickCollect\Error::class,
        '~^PATCH /api/v3/click\\-collect/orders/[^/]+/receive$~'              => InStorePickup\Api\ClickCollect\Error::class,
        '~^PATCH /api/v3/click\\-collect/orders/[^/]+/reject$~'               => InStorePickup\Api\ClickCollect\Error::class,
        '~^PATCH /api/v3/dbs/orders/[^/]+/cancel$~'                           => OrdersDbs\Api\Dbs\Error::class,
        '~^PATCH /api/v3/dbs/orders/[^/]+/confirm$~'                          => OrdersDbs\Api\Dbs\Error::class,
        '~^PATCH /api/v3/dbs/orders/[^/]+/deliver$~'                          => OrdersDbs\Api\Dbs\Error::class,
        '~^PATCH /api/v3/dbs/orders/[^/]+/receive$~'                          => OrdersDbs\Api\Dbs\Error::class,
        '~^PATCH /api/v3/dbs/orders/[^/]+/reject$~'                           => OrdersDbs\Api\Dbs\Error::class,
        '~^PATCH /api/v3/dbw/orders/[^/]+/assemble$~'                         => OrdersDbw\Api\Dbw\Error::class,
        '~^PATCH /api/v3/dbw/orders/[^/]+/cancel$~'                           => OrdersDbw\Api\Dbw\Error::class,
        '~^PATCH /api/v3/dbw/orders/[^/]+/confirm$~'                          => OrdersDbw\Api\Dbw\Error::class,
        '~^PATCH /api/v3/orders/[^/]+/cancel$~'                               => OrdersFbs\Api\Passes\Error::class,
        '~^PATCH /api/v3/supplies/[^/]+/deliver$~'                            => OrdersFbs\Api\Passes\Error::class,
        '~^PATCH /content/v2/tag/[^/]+$~'                                     => ResponseContentError::class,
        '~^POST /api/v3/stocks/[^/]+$~'                                       => POSTApiV3StocksWarehouseIdResponse::class,
        '~^POST /api/v3/supplies/[^/]+/trbx$~'                                => POSTApiV3SuppliesSupplyIdTrbxResponse::class,
        '~^POST /api/v3/supplies/[^/]+/trbx/stickers$~'                       => POSTApiV3SuppliesSupplyIdTrbxStickersResponse::class,
        '~^PUT /api/marketplace/v3/orders/[^/]+/meta/customs\\-declaration$~' => OrdersFbs\Api\Passes\Error::class,
        '~^PUT /api/v3/click\\-collect/orders/[^/]+/meta/gtin$~'              => InStorePickup\Api\ClickCollect\Error::class,
        '~^PUT /api/v3/click\\-collect/orders/[^/]+/meta/imei$~'              => InStorePickup\Api\ClickCollect\Error::class,
        '~^PUT /api/v3/click\\-collect/orders/[^/]+/meta/sgtin$~'             => InStorePickup\Api\ClickCollect\Error::class,
        '~^PUT /api/v3/click\\-collect/orders/[^/]+/meta/uin$~'               => InStorePickup\Api\ClickCollect\Error::class,
        '~^PUT /api/v3/dbs/orders/[^/]+/meta/gtin$~'                          => OrdersDbs\Api\Dbs\Error::class,
        '~^PUT /api/v3/dbs/orders/[^/]+/meta/imei$~'                          => OrdersDbs\Api\Dbs\Error::class,
        '~^PUT /api/v3/dbs/orders/[^/]+/meta/sgtin$~'                         => OrdersDbs\Api\Dbs\Error::class,
        '~^PUT /api/v3/dbs/orders/[^/]+/meta/uin$~'                           => OrdersDbs\Api\Dbs\Error::class,
        '~^PUT /api/v3/dbw/orders/[^/]+/meta/gtin$~'                          => OrdersDbw\Api\Dbw\Error::class,
        '~^PUT /api/v3/dbw/orders/[^/]+/meta/imei$~'                          => OrdersDbw\Api\Dbw\Error::class,
        '~^PUT /api/v3/dbw/orders/[^/]+/meta/sgtin$~'                         => OrdersDbw\Api\Dbw\Error::class,
        '~^PUT /api/v3/dbw/orders/[^/]+/meta/uin$~'                           => OrdersDbw\Api\Dbw\Error::class,
        '~^PUT /api/v3/dbw/warehouses/[^/]+/contacts$~'                       => Products\Api\Stocks\Error::class,
        '~^PUT /api/v3/orders/[^/]+/meta/expiration$~'                        => OrdersFbs\Api\Passes\Error::class,
        '~^PUT /api/v3/orders/[^/]+/meta/gtin$~'                              => OrdersFbs\Api\Passes\Error::class,
        '~^PUT /api/v3/orders/[^/]+/meta/imei$~'                              => OrdersFbs\Api\Passes\Error::class,
        '~^PUT /api/v3/orders/[^/]+/meta/sgtin$~'                             => OrdersFbs\Api\Passes\Error::class,
        '~^PUT /api/v3/orders/[^/]+/meta/uin$~'                               => OrdersFbs\Api\Passes\Error::class,
        '~^PUT /api/v3/passes/[^/]+$~'                                        => OrdersFbs\Api\Passes\Error::class,
        '~^PUT /api/v3/stocks/[^/]+$~'                                        => Products\Api\Stocks\Error::class,
        '~^PUT /api/v3/warehouses/[^/]+$~'                                    => Products\Api\Stocks\Error::class,
    ];

    /**
     * @return class-string<WildberriesDtoInterface>|null
     */
    public static function resolve(string $method, string $path): ?string
    {
        $key = strtoupper($method) . ' ' . normalizeWildberriesPath($path);

        if (isset(self::MAP[$key])) {
            return self::MAP[$key];
        }

        foreach (self::PATTERN_MAP as $pattern => $class) {
            if (preg_match($pattern, $key) === 1) {
                return $class;
            }
        }

        return null;
    }
}

function normalizeWildberriesPath(string $path): string
{
    return '/' . trim($path, '/');
}

function normalizeWildberriesPathPattern(string $path): string
{
    $pattern = preg_quote($path, '~');

    return '~^' . preg_replace('~\\\\\{[^/]+\\\\\}~', '[^/]+', $pattern) . '$~';
}
