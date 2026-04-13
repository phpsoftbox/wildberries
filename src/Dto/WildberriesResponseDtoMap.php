<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Dto;

use PhpSoftBox\Wildberries\Dto\Analytics\Api\ItemHistoryResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\NmReport\GetV2NmReportDownloadsFileDownloadIdResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\NmReport\NmReportCreateReportResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\NmReport\NmReportGetReportsResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\NmReport\NmReportRetryReportResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\PostAnalyticsV1StocksReportSellerWarehousesResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\PostV1OrderFeedResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\PostV1StocksReportWbWarehousesResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\PostV2ItemRatingResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\PostV3SalesFunnelGroupedHistoryResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\PostV3SalesFunnelProductsResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport\PostV2SearchReportProductOrdersResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport\PostV2SearchReportProductSearchTextsResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport\PostV2SearchReportReportResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport\PostV2SearchReportTableDetailsResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\SearchReport\PostV2SearchReportTableGroupsResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport\PostV2StocksReportOfficesResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport\PostV2StocksReportProductsGroupsResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport\PostV2StocksReportProductsProductsResponse;
use PhpSoftBox\Wildberries\Dto\Analytics\Api\StocksReport\PostV2StocksReportProductsSizesResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Claim\PatchV1ClaimResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Claims\CommunicationsGetClaimsSuccessResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedback\GetV1FeedbackResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\DeleteFeedbacksV1PinsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\GetFeedbacksV1PinsCountResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\GetFeedbacksV1PinsLimitsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\GetFeedbacksV1PinsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\GetV1FeedbacksArchiveResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\GetV1FeedbacksCountResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\GetV1FeedbacksCountUnansweredResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\GetV1FeedbacksResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\PatchV1FeedbacksAnswerResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\PostFeedbacksV1PinsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\PostV1FeedbacksAnswerResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Feedbacks\PostV1FeedbacksOrderReturnResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\NewFeedbacksQuestions\GetV1NewFeedbacksQuestionsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Question\GetV1QuestionResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Questions\GetV1QuestionsCountResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Questions\GetV1QuestionsCountUnansweredResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Questions\GetV1QuestionsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Questions\PatchV1QuestionsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Seller\ChatsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Seller\EventsResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Seller\GetV1SellerDownloadIdResponse;
use PhpSoftBox\Wildberries\Dto\Communications\Api\Seller\MessageResponse;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Account\GetV1AccountBalanceResponse;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Documents\GetCategories;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Documents\GetDoc;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Documents\GetDocs;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Documents\GetList;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Finance\PostV1AcquiringDetailedReportIdResponse;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Finance\PostV1AcquiringDetailedResponse;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Finance\PostV1AcquiringListResponse;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Finance\PostV1SalesReportsDetailedReportIdResponse;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Finance\PostV1SalesReportsDetailedResponse;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Finance\PostV1SalesReportsListResponse;
use PhpSoftBox\Wildberries\Dto\Finances\Api\Supplier\GETApiV5SupplierReportDetailByPeriodResponse;
use PhpSoftBox\Wildberries\Dto\General\Api\Common\PlanBuilderOptionsInfo;
use PhpSoftBox\Wildberries\Dto\General\Api\Common\SubscriptionsJamInfo;
use PhpSoftBox\Wildberries\Dto\General\Api\Common\SupplierRatingModel;
use PhpSoftBox\Wildberries\Dto\General\Api\Communications\GetV2NewsResponse;
use PhpSoftBox\Wildberries\Dto\General\Api\Invite\CreateInviteResponse;
use PhpSoftBox\Wildberries\Dto\General\Api\SellerInfo\GetV1SellerInfoResponse;
use PhpSoftBox\Wildberries\Dto\General\Api\User\DeleteV1UserResponse;
use PhpSoftBox\Wildberries\Dto\General\Api\Users\GetUsersResponse;
use PhpSoftBox\Wildberries\Dto\General\Api\Users\PutV1UsersAccessResponse;
use PhpSoftBox\Wildberries\Dto\General\Ping\GetPingResponse;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\ApiCheckedIdentity;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\ApiNewOrders;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\ApiOrderClientInfoResp;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\ApiOrders;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\ApiOrdersMeta;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\ApiOrderStatuses;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\DELETEApiV3ClickCollectOrdersOrderIdMetaResponse;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\PATCHApiV3ClickCollectOrdersOrderIdCancelResponse;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\PATCHApiV3ClickCollectOrdersOrderIdConfirmResponse;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\PATCHApiV3ClickCollectOrdersOrderIdPrepareResponse;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\PATCHApiV3ClickCollectOrdersOrderIdReceiveResponse;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\PATCHApiV3ClickCollectOrdersOrderIdRejectResponse;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\PUTApiV3ClickCollectOrdersOrderIdMetaGtinResponse;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\PUTApiV3ClickCollectOrdersOrderIdMetaImeiResponse;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\PUTApiV3ClickCollectOrdersOrderIdMetaSgtinResponse;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\ClickCollect\PUTApiV3ClickCollectOrdersOrderIdMetaUinResponse;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\Marketplace\ApiCustomsDeclarationSetResponse;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\Marketplace\ApiMetaDetailsResponse;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\Marketplace\ApiMetaSetResponses;
use PhpSoftBox\Wildberries\Dto\InStorePickup\Api\Marketplace\ApiOrdersResponses;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\ApiOrderGroup;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\DbsOnlyClientInfoResp;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\DELETEApiV3DbsOrdersOrderIdMetaResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\GETApiV3DbsOrdersOrderIdMetaResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\GetV3DbsOrdersNewResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\GetV3DbsOrdersResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\PATCHApiV3DbsOrdersOrderIdCancelResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\PATCHApiV3DbsOrdersOrderIdConfirmResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\PATCHApiV3DbsOrdersOrderIdDeliverResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\PATCHApiV3DbsOrdersOrderIdReceiveResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\PATCHApiV3DbsOrdersOrderIdRejectResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\POSTApiV3DbsOrdersStatusResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\PUTApiV3DbsOrdersOrderIdMetaGtinResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\PUTApiV3DbsOrdersOrderIdMetaImeiResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\PUTApiV3DbsOrdersOrderIdMetaSgtinResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Dbs\PUTApiV3DbsOrdersOrderIdMetaUinResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Marketplace\ApiB2bClientInfoResponses;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Marketplace\ApiStatusSetDeliverResponses;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Marketplace\PostV3DbsOrdersStatusReceiveResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbs\Api\Marketplace\PostV3DbsOrdersStickersResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\DELETEApiV3DbwOrdersOrderIdMetaResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\GETApiV3DbwOrdersOrderIdMetaResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\GetV3DbwOrdersNewResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\GetV3DbwOrdersResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\OrderCourierInfoResp;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\PATCHApiV3DbwOrdersOrderIdAssembleResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\PatchV3DbwOrdersOrderIdCancelResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\PatchV3DbwOrdersOrderIdConfirmResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\PostV3DbwOrdersStatusResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\PostV3DbwOrdersStickersResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\PUTApiV3DbwOrdersOrderIdMetaSgtinResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\PutV3DbwOrdersOrderIdMetaGtinResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\PutV3DbwOrdersOrderIdMetaImeiResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Dbw\PutV3DbwOrdersOrderIdMetaUinResponse;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Marketplace\ClientInfoResp;
use PhpSoftBox\Wildberries\Dto\OrdersDbw\Api\Marketplace\PostV3DbwOrdersMetaDeleteResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\CountriesOKSMList;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\GetMarketplaceV3FbsSettingsAutoreturnsResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\GetMarketplaceV3FbsSettingsAutoreturnsSubcategoriesRestrictedResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\PATCHApiMarketplaceV3SuppliesSupplyIdOrdersResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\PatchMarketplaceV3FbsSettingsAutoreturnsItemsResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\PatchMarketplaceV3FbsSettingsAutoreturnsResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\PostMarketplaceV3FbsSettingsAutoreturnsItemsResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\PUTApiMarketplaceV3OrdersOrderIdMetaCustomsDeclarationResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\PutV3FbsSuppliesSupplyIdSpotResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\ShippingPointsResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\SupplySpotDataResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\SupplySpotQRCode;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\UpdateSuppliesResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\V3ArchiveOrders;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\V3OrdersMetaAPI;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Marketplace\V3SupplyOrderIDsAPI;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\CrossborderTurkeyClientInfoResp;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\DELETEApiV3OrdersOrderIdMetaResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\GETApiV3OrdersNewResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\GETApiV3OrdersResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\PATCHApiV3OrdersOrderIdCancelResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\POSTApiV3OrdersStatusHistoryResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\POSTApiV3OrdersStatusResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\POSTApiV3OrdersStickersCrossBorderResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\POSTApiV3OrdersStickersResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\PUTApiV3OrdersOrderIdMetaExpirationResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\PUTApiV3OrdersOrderIdMetaGtinResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\PUTApiV3OrdersOrderIdMetaImeiResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\PUTApiV3OrdersOrderIdMetaSgtinResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Orders\PUTApiV3OrdersOrderIdMetaUinResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Passes\DELETEApiV3PassesPassIdResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Passes\GETApiV3PassesOfficesResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Passes\GETApiV3PassesResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Passes\POSTApiV3PassesResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Passes\PUTApiV3PassesPassIdResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\DELETEApiV3SuppliesSupplyIdResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\DELETEApiV3SuppliesSupplyIdTrbxResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\GETApiV3SuppliesOrdersReshipmentResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\GETApiV3SuppliesResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\GETApiV3SuppliesSupplyIdBarcodeResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\GETApiV3SuppliesSupplyIdTrbxResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\PATCHApiV3SuppliesSupplyIdDeliverResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\POSTApiV3SuppliesResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\POSTApiV3SuppliesSupplyIdTrbxResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\POSTApiV3SuppliesSupplyIdTrbxStickersResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbs\Api\Supplies\Supply;
use PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Acceptance\ModelsOptionsResultModel;
use PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Supplies\GetV1SuppliesIdGoodsResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Supplies\GetV1SuppliesIdPackageResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Supplies\ModelsSupplyDetails;
use PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Supplies\PostV1SuppliesResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\TransitTariffs\GetV1TransitTariffsResponse;
use PhpSoftBox\Wildberries\Dto\OrdersFbw\Api\Warehouses\GetV1WarehousesResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Buffer\ProductsResponseGoodBufferHistories;
use PhpSoftBox\Wildberries\Dto\Products\Api\Buffer\ProductsResponseTaskBuffer;
use PhpSoftBox\Wildberries\Dto\Products\Api\Content\BrandsResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Content\GetRecomRes;
use PhpSoftBox\Wildberries\Dto\Products\Api\Content\SetRecomRes;
use PhpSoftBox\Wildberries\Dto\Products\Api\Dbw\GETApiV3DbwWarehousesWarehouseIdContactsResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Dbw\PUTApiV3DbwWarehousesWarehouseIdContactsResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\DiscountsPrices\ProductsSuccessTaskResponseV3;
use PhpSoftBox\Wildberries\Dto\Products\Api\History\ProductsResponseGoodHistories;
use PhpSoftBox\Wildberries\Dto\Products\Api\History\ProductsResponseTaskHistory;
use PhpSoftBox\Wildberries\Dto\Products\Api\List\ProductsResponseItemsLists;
use PhpSoftBox\Wildberries\Dto\Products\Api\List\ProductsResponseSizeLists;
use PhpSoftBox\Wildberries\Dto\Products\Api\Offices\GETApiV3OfficesResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Quarantine\ProductsResponseQuarantineItems;
use PhpSoftBox\Wildberries\Dto\Products\Api\Stocks\DELETEApiV3StocksWarehouseIdResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Stocks\POSTApiV3StocksWarehouseIdResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Stocks\PUTApiV3StocksWarehouseIdResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Upload\ProductsSuccessTaskResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Warehouses\DELETEApiV3WarehousesWarehouseIdResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Warehouses\GETApiV3WarehousesResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Warehouses\POSTApiV3WarehousesResponse;
use PhpSoftBox\Wildberries\Dto\Products\Api\Warehouses\PUTApiV3WarehousesWarehouseIdResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Barcodes\POSTContentV2BarcodesResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Cards\GETContentV2CardsLimitsResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Cards\POSTContentV2CardsDeleteTrashResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Cards\POSTContentV2CardsRecoverResponse;
use PhpSoftBox\Wildberries\Dto\Products\Content\Cards\ResponseItemList;
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
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Advert\GetV1AdvertResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Adverts\GetV1AdvertsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Auction\PatchV0AuctionNmsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Auction\PutV0AuctionPlacementsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Balance\GetV1BalanceResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Budget\GetV1BudgetResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Budget\ResponseWithReturn;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Count\GetV1CountResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Delete\GetV0DeleteResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Fullstats\ResponseFullStats;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\GetV1PromotionCountResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery\DeleteV0NormqueryBidsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery\PostV0NormqueryBidsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery\PostV0NormquerySetMinusResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery\V0GetNormQueryBidsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery\V0GetNormQueryListResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery\V0GetNormQueryMinusResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery\V0GetNormQueryStatsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Normquery\V1GetNormQueryStatsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Pause\GetV0PauseResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Payments\GetV1PaymentsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Rename\PostV0RenameResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Seacat\PostV2SeacatSaveAdResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Start\GetV0StartResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Stats\PostV1StatsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Stop\GetV0StopResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Supplier\GetV1SupplierSubjectsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Supplier\PostV2SupplierNmsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Adv\Upd\GetV1UpdResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert\GetAdverts;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert\GetV0BidsRecommendationsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert\PatchV1BidsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert\PostV1BidsMinResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert\V1SetNormQueryBidsResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Advert\V2GetConfigResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Calendar\PromotionPromosGetByIDSuccessResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Calendar\PromotionPromoSuccessResponse;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Calendar\PromotionResponsePromoItemsLists;
use PhpSoftBox\Wildberries\Dto\Promotion\Api\Calendar\PromotionUploadSuccessResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\AcceptanceReport\GetV1AcceptanceReportTasksTaskIdDownloadResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\ExciseReportResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\GETApiV1AnalyticsBannedProductsShadowedResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\GetV1AnalyticsBannedProducsBlockedResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Analytics\GetV1AnalyticsGoodsReturnResponse;
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
use PhpSoftBox\Wildberries\Dto\Reports\Api\Supplier\GETApiV1SupplierStocksResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Supplier\GetV1SupplierOrdersResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\Supplier\GetV1SupplierSalesResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\WarehouseRemains\CreateTaskResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\WarehouseRemains\GetTasksResponse;
use PhpSoftBox\Wildberries\Dto\Reports\Api\WarehouseRemains\GetV1WarehouseRemainsTasksTaskIdDownloadResponse;
use PhpSoftBox\Wildberries\Dto\Sandbox\Api\Test\PATCHApiV3TestFbsOrdersOrderIdDeclineResponse;
use PhpSoftBox\Wildberries\Dto\Sandbox\Api\Test\PATCHApiV3TestFbsOrdersOrderIdDefectResponse;
use PhpSoftBox\Wildberries\Dto\Sandbox\Api\Test\PATCHApiV3TestFbsOrdersOrderIdDeliverResponse;
use PhpSoftBox\Wildberries\Dto\Sandbox\Api\Test\PATCHApiV3TestFbsOrdersOrderIdReceiveResponse;
use PhpSoftBox\Wildberries\Dto\Sandbox\Api\Test\PATCHApiV3TestFbsOrdersOrderIdRejectResponse;
use PhpSoftBox\Wildberries\Dto\Sandbox\Api\Test\PATCHApiV3TestFbsSuppliesSupplyIdCloseResponse;
use PhpSoftBox\Wildberries\Dto\Sandbox\Api\Test\POSTApiV3TestFbsOrdersMakeResponse;
use PhpSoftBox\Wildberries\Dto\Tariffs\Api\GetV1AcceptanceCoefficientsResponse;
use PhpSoftBox\Wildberries\Dto\Tariffs\Api\GetV1TariffsCommissionResponse;
use PhpSoftBox\Wildberries\Dto\Tariffs\Api\RatesBoxResponse;
use PhpSoftBox\Wildberries\Dto\Tariffs\Api\RatesPalletResponse;
use PhpSoftBox\Wildberries\Dto\Tariffs\Api\ReturnRatesResponse;

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
        'DELETE /adv/v0/normquery/bids'                                             => DeleteV0NormqueryBidsResponse::class,
        'DELETE /api/feedbacks/v1/pins'                                             => DeleteFeedbacksV1PinsResponse::class,
        'DELETE /api/v1/user'                                                       => DeleteV1UserResponse::class,
        'DELETE /api/v3/click-collect/orders/{orderId}/meta'                        => DELETEApiV3ClickCollectOrdersOrderIdMetaResponse::class,
        'DELETE /api/v3/dbs/orders/{orderId}/meta'                                  => DELETEApiV3DbsOrdersOrderIdMetaResponse::class,
        'DELETE /api/v3/dbw/orders/{orderId}/meta'                                  => DELETEApiV3DbwOrdersOrderIdMetaResponse::class,
        'DELETE /api/v3/orders/{orderId}/meta'                                      => DELETEApiV3OrdersOrderIdMetaResponse::class,
        'DELETE /api/v3/passes/{passId}'                                            => DELETEApiV3PassesPassIdResponse::class,
        'DELETE /api/v3/stocks/{warehouseId}'                                       => DELETEApiV3StocksWarehouseIdResponse::class,
        'DELETE /api/v3/supplies/{supplyId}'                                        => DELETEApiV3SuppliesSupplyIdResponse::class,
        'DELETE /api/v3/supplies/{supplyId}/trbx'                                   => DELETEApiV3SuppliesSupplyIdTrbxResponse::class,
        'DELETE /api/v3/warehouses/{warehouseId}'                                   => DELETEApiV3WarehousesWarehouseIdResponse::class,
        'DELETE /content/v2/tag/{id}'                                               => ResponseContentError::class,
        'GET /adv/v0/delete'                                                        => GetV0DeleteResponse::class,
        'GET /adv/v0/pause'                                                         => GetV0PauseResponse::class,
        'GET /adv/v0/start'                                                         => GetV0StartResponse::class,
        'GET /adv/v0/stop'                                                          => GetV0StopResponse::class,
        'GET /adv/v1/advert'                                                        => GetV1AdvertResponse::class,
        'GET /adv/v1/adverts'                                                       => GetV1AdvertsResponse::class,
        'GET /adv/v1/balance'                                                       => GetV1BalanceResponse::class,
        'GET /adv/v1/budget'                                                        => GetV1BudgetResponse::class,
        'GET /adv/v1/count'                                                         => GetV1CountResponse::class,
        'GET /adv/v1/payments'                                                      => GetV1PaymentsResponse::class,
        'GET /adv/v1/promotion/count'                                               => GetV1PromotionCountResponse::class,
        'GET /adv/v1/supplier/subjects'                                             => GetV1SupplierSubjectsResponse::class,
        'GET /adv/v1/upd'                                                           => GetV1UpdResponse::class,
        'GET /adv/v3/fullstats'                                                     => ResponseFullStats::class,
        'GET /api/advert/v0/bids/recommendations'                                   => GetV0BidsRecommendationsResponse::class,
        'GET /api/advert/v1/config'                                                 => V2GetConfigResponse::class,
        'GET /api/advert/v2/adverts'                                                => GetAdverts::class,
        'GET /api/analytics/v1/deductions'                                          => ReportsSuccessSubstIncorAttachResponse::class,
        'GET /api/analytics/v1/measurement-penalties'                               => MeasurementPenalties::class,
        'GET /api/analytics/v1/warehouse-measurements'                              => WHM::class,
        'GET /api/common/v1/rating'                                                 => SupplierRatingModel::class,
        'GET /api/common/v1/subscriptions'                                          => SubscriptionsJamInfo::class,
        'GET /api/common/v1/tariff-constructor/options'                             => PlanBuilderOptionsInfo::class,
        'GET /api/communications/v2/news'                                           => GetV2NewsResponse::class,
        'GET /api/content/v1/brands'                                                => BrandsResponse::class,
        'GET /api/feedbacks/v1/pins'                                                => GetFeedbacksV1PinsResponse::class,
        'GET /api/feedbacks/v1/pins/count'                                          => GetFeedbacksV1PinsCountResponse::class,
        'GET /api/feedbacks/v1/pins/limits'                                         => GetFeedbacksV1PinsLimitsResponse::class,
        'GET /api/marketplace/v3/fbs/dictionaries/countries/oksm'                   => CountriesOKSMList::class,
        'GET /api/marketplace/v3/fbs/orders/archive'                                => V3ArchiveOrders::class,
        'GET /api/marketplace/v3/fbs/settings/autoreturns'                          => GetMarketplaceV3FbsSettingsAutoreturnsResponse::class,
        'GET /api/marketplace/v3/fbs/settings/autoreturns/subcategories/restricted' => GetMarketplaceV3FbsSettingsAutoreturnsSubcategoriesRestrictedResponse::class,
        'GET /api/marketplace/v3/fbs/shipping-points'                               => ShippingPointsResponse::class,
        'GET /api/marketplace/v3/fbs/supplies/{supplyId}/stickers/spot'             => SupplySpotQRCode::class,
        'GET /api/marketplace/v3/supplies/{supplyId}/order-ids'                     => V3SupplyOrderIDsAPI::class,
        'GET /api/tariffs/v1/acceptance/coefficients'                               => GetV1AcceptanceCoefficientsResponse::class,
        'GET /api/v1/acceptance_report'                                             => CreateTaskResponse::class,
        'GET /api/v1/acceptance_report/tasks/{task_id}/download'                    => GetV1AcceptanceReportTasksTaskIdDownloadResponse::class,
        'GET /api/v1/acceptance_report/tasks/{task_id}/status'                      => GetTasksResponse::class,
        'GET /api/v1/account/balance'                                               => GetV1AccountBalanceResponse::class,
        'GET /api/v1/analytics/antifraud-details'                                   => ReportsSuccessTaskResponse::class,
        'GET /api/v1/analytics/banned-products/blocked'                             => GetV1AnalyticsBannedProducsBlockedResponse::class,
        'GET /api/v1/analytics/banned-products/shadowed'                            => GETApiV1AnalyticsBannedProductsShadowedResponse::class,
        'GET /api/v1/analytics/brand-share'                                         => ReportsSuccessBrandShareResponse::class,
        'GET /api/v1/analytics/brand-share/brands'                                  => ReportsSuccessBrandsResponse::class,
        'GET /api/v1/analytics/brand-share/parent-subjects'                         => ReportsSuccessParentsResponse::class,
        'GET /api/v1/analytics/goods-labeling'                                      => ReportsSuccessGoodsLabelingResponse::class,
        'GET /api/v1/analytics/goods-return'                                        => GetV1AnalyticsGoodsReturnResponse::class,
        'GET /api/v1/analytics/region-sale'                                         => ReportsSuccessRegionSaleResponse::class,
        'GET /api/v1/calendar/promotions'                                           => PromotionPromoSuccessResponse::class,
        'GET /api/v1/calendar/promotions/details'                                   => PromotionPromosGetByIDSuccessResponse::class,
        'GET /api/v1/calendar/promotions/nomenclatures'                             => PromotionResponsePromoItemsLists::class,
        'GET /api/v1/claims'                                                        => CommunicationsGetClaimsSuccessResponse::class,
        'GET /api/v1/documents/categories'                                          => GetCategories::class,
        'GET /api/v1/documents/download'                                            => GetDoc::class,
        'GET /api/v1/documents/list'                                                => GetList::class,
        'GET /api/v1/feedback'                                                      => GetV1FeedbackResponse::class,
        'GET /api/v1/feedbacks'                                                     => GetV1FeedbacksResponse::class,
        'GET /api/v1/feedbacks/archive'                                             => GetV1FeedbacksArchiveResponse::class,
        'GET /api/v1/feedbacks/count'                                               => GetV1FeedbacksCountResponse::class,
        'GET /api/v1/feedbacks/count-unanswered'                                    => GetV1FeedbacksCountUnansweredResponse::class,
        'GET /api/v1/new-feedbacks-questions'                                       => GetV1NewFeedbacksQuestionsResponse::class,
        'GET /api/v1/paid_storage'                                                  => CreateTaskResponse::class,
        'GET /api/v1/paid_storage/tasks/{task_id}/download'                         => ResponsePaidStorage::class,
        'GET /api/v1/paid_storage/tasks/{task_id}/status'                           => GetTasksResponse::class,
        'GET /api/v1/question'                                                      => GetV1QuestionResponse::class,
        'GET /api/v1/questions'                                                     => GetV1QuestionsResponse::class,
        'GET /api/v1/questions/count'                                               => GetV1QuestionsCountResponse::class,
        'GET /api/v1/questions/count-unanswered'                                    => GetV1QuestionsCountUnansweredResponse::class,
        'GET /api/v1/seller-info'                                                   => GetV1SellerInfoResponse::class,
        'GET /api/v1/seller/chats'                                                  => ChatsResponse::class,
        'GET /api/v1/seller/download/{id}'                                          => GetV1SellerDownloadIdResponse::class,
        'GET /api/v1/seller/events'                                                 => EventsResponse::class,
        'GET /api/v1/supplier/orders'                                               => GetV1SupplierOrdersResponse::class,
        'GET /api/v1/supplier/sales'                                                => GetV1SupplierSalesResponse::class,
        'GET /api/v1/supplier/stocks'                                               => GETApiV1SupplierStocksResponse::class,
        'GET /api/v1/supplies/{ID}'                                                 => ModelsSupplyDetails::class,
        'GET /api/v1/supplies/{ID}/goods'                                           => GetV1SuppliesIdGoodsResponse::class,
        'GET /api/v1/supplies/{ID}/package'                                         => GetV1SuppliesIdPackageResponse::class,
        'GET /api/v1/tariffs/box'                                                   => RatesBoxResponse::class,
        'GET /api/v1/tariffs/commission'                                            => GetV1TariffsCommissionResponse::class,
        'GET /api/v1/tariffs/pallet'                                                => RatesPalletResponse::class,
        'GET /api/v1/tariffs/return'                                                => ReturnRatesResponse::class,
        'GET /api/v1/transit-tariffs'                                               => GetV1TransitTariffsResponse::class,
        'GET /api/v1/users'                                                         => GetUsersResponse::class,
        'GET /api/v1/warehouse_remains'                                             => CreateTaskResponse::class,
        'GET /api/v1/warehouse_remains/tasks/{task_id}/download'                    => GetV1WarehouseRemainsTasksTaskIdDownloadResponse::class,
        'GET /api/v1/warehouse_remains/tasks/{task_id}/status'                      => GetTasksResponse::class,
        'GET /api/v1/warehouses'                                                    => GetV1WarehousesResponse::class,
        'GET /api/v2/buffer/goods/task'                                             => ProductsResponseGoodBufferHistories::class,
        'GET /api/v2/buffer/tasks'                                                  => ProductsResponseTaskBuffer::class,
        'GET /api/v2/history/goods/task'                                            => ProductsResponseGoodHistories::class,
        'GET /api/v2/history/tasks'                                                 => ProductsResponseTaskHistory::class,
        'GET /api/v2/list/goods/filter'                                             => ProductsResponseItemsLists::class,
        'GET /api/v2/list/goods/size/nm'                                            => ProductsResponseSizeLists::class,
        'GET /api/v2/nm-report/downloads'                                           => NmReportGetReportsResponse::class,
        'GET /api/v2/nm-report/downloads/file/{downloadId}'                         => GetV2NmReportDownloadsFileDownloadIdResponse::class,
        'GET /api/v2/quarantine/goods'                                              => ProductsResponseQuarantineItems::class,
        'GET /api/v3/click-collect/orders'                                          => ApiOrders::class,
        'GET /api/v3/click-collect/orders/new'                                      => ApiNewOrders::class,
        'GET /api/v3/click-collect/orders/{orderId}/meta'                           => ApiOrdersMeta::class,
        'GET /api/v3/dbs/orders'                                                    => GetV3DbsOrdersResponse::class,
        'GET /api/v3/dbs/orders/new'                                                => GetV3DbsOrdersNewResponse::class,
        'GET /api/v3/dbs/orders/{orderId}/meta'                                     => GETApiV3DbsOrdersOrderIdMetaResponse::class,
        'GET /api/v3/dbw/orders'                                                    => GetV3DbwOrdersResponse::class,
        'GET /api/v3/dbw/orders/new'                                                => GetV3DbwOrdersNewResponse::class,
        'GET /api/v3/dbw/orders/{orderId}/meta'                                     => GETApiV3DbwOrdersOrderIdMetaResponse::class,
        'GET /api/v3/dbw/warehouses/{warehouseId}/contacts'                         => GETApiV3DbwWarehousesWarehouseIdContactsResponse::class,
        'GET /api/v3/offices'                                                       => GETApiV3OfficesResponse::class,
        'GET /api/v3/orders'                                                        => GETApiV3OrdersResponse::class,
        'GET /api/v3/orders/new'                                                    => GETApiV3OrdersNewResponse::class,
        'GET /api/v3/passes'                                                        => GETApiV3PassesResponse::class,
        'GET /api/v3/passes/offices'                                                => GETApiV3PassesOfficesResponse::class,
        'GET /api/v3/supplies'                                                      => GETApiV3SuppliesResponse::class,
        'GET /api/v3/supplies/orders/reshipment'                                    => GETApiV3SuppliesOrdersReshipmentResponse::class,
        'GET /api/v3/supplies/{supplyId}'                                           => Supply::class,
        'GET /api/v3/supplies/{supplyId}/barcode'                                   => GETApiV3SuppliesSupplyIdBarcodeResponse::class,
        'GET /api/v3/supplies/{supplyId}/trbx'                                      => GETApiV3SuppliesSupplyIdTrbxResponse::class,
        'GET /api/v3/warehouses'                                                    => GETApiV3WarehousesResponse::class,
        'GET /api/v5/supplier/reportDetailByPeriod'                                 => GETApiV5SupplierReportDetailByPeriodResponse::class,
        'GET /content/v2/cards/limits'                                              => GETContentV2CardsLimitsResponse::class,
        'GET /content/v2/directory/colors'                                          => GETContentV2DirectoryColorsResponse::class,
        'GET /content/v2/directory/countries'                                       => GETContentV2DirectoryCountriesResponse::class,
        'GET /content/v2/directory/kinds'                                           => GETContentV2DirectoryKindsResponse::class,
        'GET /content/v2/directory/seasons'                                         => GETContentV2DirectorySeasonsResponse::class,
        'GET /content/v2/directory/tnved'                                           => GETContentV2DirectoryTnvedResponse::class,
        'GET /content/v2/directory/vat'                                             => GETContentV2DirectoryVatResponse::class,
        'GET /content/v2/object/all'                                                => GETContentV2ObjectAllResponse::class,
        'GET /content/v2/object/charcs/{subjectId}'                                 => GETContentV2ObjectCharcsSubjectIdResponse::class,
        'GET /content/v2/object/parent/all'                                         => GETContentV2ObjectParentAllResponse::class,
        'GET /content/v2/tags'                                                      => GETContentV2TagsResponse::class,
        'GET /ping'                                                                 => GetPingResponse::class,
        'PATCH /adv/v0/auction/nms'                                                 => PatchV0AuctionNmsResponse::class,
        'PATCH /api/advert/v1/bids'                                                 => PatchV1BidsResponse::class,
        'PATCH /api/marketplace/v3/fbs/settings/autoreturns'                        => PatchMarketplaceV3FbsSettingsAutoreturnsResponse::class,
        'PATCH /api/marketplace/v3/fbs/settings/autoreturns/items'                  => PatchMarketplaceV3FbsSettingsAutoreturnsItemsResponse::class,
        'PATCH /api/marketplace/v3/fbs/supplies/shipping-method'                    => UpdateSuppliesResponse::class,
        'PATCH /api/marketplace/v3/fbs/supplies/waybill'                            => UpdateSuppliesResponse::class,
        'PATCH /api/marketplace/v3/supplies/{supplyId}/orders'                      => PATCHApiMarketplaceV3SuppliesSupplyIdOrdersResponse::class,
        'PATCH /api/v1/claim'                                                       => PatchV1ClaimResponse::class,
        'PATCH /api/v1/feedbacks/answer'                                            => PatchV1FeedbacksAnswerResponse::class,
        'PATCH /api/v1/questions'                                                   => PatchV1QuestionsResponse::class,
        'PATCH /api/v3/click-collect/orders/{orderId}/cancel'                       => PATCHApiV3ClickCollectOrdersOrderIdCancelResponse::class,
        'PATCH /api/v3/click-collect/orders/{orderId}/confirm'                      => PATCHApiV3ClickCollectOrdersOrderIdConfirmResponse::class,
        'PATCH /api/v3/click-collect/orders/{orderId}/prepare'                      => PATCHApiV3ClickCollectOrdersOrderIdPrepareResponse::class,
        'PATCH /api/v3/click-collect/orders/{orderId}/receive'                      => PATCHApiV3ClickCollectOrdersOrderIdReceiveResponse::class,
        'PATCH /api/v3/click-collect/orders/{orderId}/reject'                       => PATCHApiV3ClickCollectOrdersOrderIdRejectResponse::class,
        'PATCH /api/v3/dbs/orders/{orderId}/cancel'                                 => PATCHApiV3DbsOrdersOrderIdCancelResponse::class,
        'PATCH /api/v3/dbs/orders/{orderId}/confirm'                                => PATCHApiV3DbsOrdersOrderIdConfirmResponse::class,
        'PATCH /api/v3/dbs/orders/{orderId}/deliver'                                => PATCHApiV3DbsOrdersOrderIdDeliverResponse::class,
        'PATCH /api/v3/dbs/orders/{orderId}/receive'                                => PATCHApiV3DbsOrdersOrderIdReceiveResponse::class,
        'PATCH /api/v3/dbs/orders/{orderId}/reject'                                 => PATCHApiV3DbsOrdersOrderIdRejectResponse::class,
        'PATCH /api/v3/dbw/orders/{orderId}/assemble'                               => PATCHApiV3DbwOrdersOrderIdAssembleResponse::class,
        'PATCH /api/v3/dbw/orders/{orderId}/cancel'                                 => PatchV3DbwOrdersOrderIdCancelResponse::class,
        'PATCH /api/v3/dbw/orders/{orderId}/confirm'                                => PatchV3DbwOrdersOrderIdConfirmResponse::class,
        'PATCH /api/v3/orders/{orderId}/cancel'                                     => PATCHApiV3OrdersOrderIdCancelResponse::class,
        'PATCH /api/v3/supplies/{supplyId}/deliver'                                 => PATCHApiV3SuppliesSupplyIdDeliverResponse::class,
        'PATCH /api/v3/test/fbs/orders/{orderId}/decline'                           => PATCHApiV3TestFbsOrdersOrderIdDeclineResponse::class,
        'PATCH /api/v3/test/fbs/orders/{orderId}/defect'                            => PATCHApiV3TestFbsOrdersOrderIdDefectResponse::class,
        'PATCH /api/v3/test/fbs/orders/{orderId}/deliver'                           => PATCHApiV3TestFbsOrdersOrderIdDeliverResponse::class,
        'PATCH /api/v3/test/fbs/orders/{orderId}/receive'                           => PATCHApiV3TestFbsOrdersOrderIdReceiveResponse::class,
        'PATCH /api/v3/test/fbs/orders/{orderId}/reject'                            => PATCHApiV3TestFbsOrdersOrderIdRejectResponse::class,
        'PATCH /api/v3/test/fbs/supplies/{supplyId}/close'                          => PATCHApiV3TestFbsSuppliesSupplyIdCloseResponse::class,
        'PATCH /content/v2/tag/{id}'                                                => ResponseContentError::class,
        'POST /adv/v0/normquery/bids'                                               => PostV0NormqueryBidsResponse::class,
        'POST /adv/v0/normquery/get-bids'                                           => V0GetNormQueryBidsResponse::class,
        'POST /adv/v0/normquery/get-minus'                                          => V0GetNormQueryMinusResponse::class,
        'POST /adv/v0/normquery/list'                                               => V0GetNormQueryListResponse::class,
        'POST /adv/v0/normquery/set-minus'                                          => PostV0NormquerySetMinusResponse::class,
        'POST /adv/v0/normquery/stats'                                              => V0GetNormQueryStatsResponse::class,
        'POST /adv/v0/rename'                                                       => PostV0RenameResponse::class,
        'POST /adv/v1/budget/deposit'                                               => ResponseWithReturn::class,
        'POST /adv/v1/normquery/stats'                                              => V1GetNormQueryStatsResponse::class,
        'POST /adv/v1/stats'                                                        => PostV1StatsResponse::class,
        'POST /adv/v2/seacat/save-ad'                                               => PostV2SeacatSaveAdResponse::class,
        'POST /adv/v2/supplier/nms'                                                 => PostV2SupplierNmsResponse::class,
        'POST /api/advert/v1/bids/min'                                              => PostV1BidsMinResponse::class,
        'POST /api/advert/v1/normquery/bids'                                        => V1SetNormQueryBidsResponse::class,
        'POST /api/analytics/v1/order-feed'                                         => PostV1OrderFeedResponse::class,
        'POST /api/analytics/v1/stocks-report/seller-warehouses'                    => PostAnalyticsV1StocksReportSellerWarehousesResponse::class,
        'POST /api/analytics/v1/stocks-report/wb-warehouses'                        => PostV1StocksReportWbWarehousesResponse::class,
        'POST /api/analytics/v2/item-rating'                                        => PostV2ItemRatingResponse::class,
        'POST /api/analytics/v3/sales-funnel/grouped/history'                       => PostV3SalesFunnelGroupedHistoryResponse::class,
        'POST /api/analytics/v3/sales-funnel/products'                              => PostV3SalesFunnelProductsResponse::class,
        'POST /api/analytics/v3/sales-funnel/products/history'                      => ItemHistoryResponse::class,
        'POST /api/content/v1/recommendations/list'                                 => GetRecomRes::class,
        'POST /api/content/v1/recommendations/set'                                  => SetRecomRes::class,
        'POST /api/discounts-prices/v1/upload/task/b2b/wholesale'                   => ProductsSuccessTaskResponseV3::class,
        'POST /api/feedbacks/v1/pins'                                               => PostFeedbacksV1PinsResponse::class,
        'POST /api/finance/v1/acquiring/detailed'                                   => PostV1AcquiringDetailedResponse::class,
        'POST /api/finance/v1/acquiring/detailed/{reportId}'                        => PostV1AcquiringDetailedReportIdResponse::class,
        'POST /api/finance/v1/acquiring/list'                                       => PostV1AcquiringListResponse::class,
        'POST /api/finance/v1/sales-reports/detailed'                               => PostV1SalesReportsDetailedResponse::class,
        'POST /api/finance/v1/sales-reports/detailed/{reportId}'                    => PostV1SalesReportsDetailedReportIdResponse::class,
        'POST /api/finance/v1/sales-reports/list'                                   => PostV1SalesReportsListResponse::class,
        'POST /api/marketplace/v3/click-collect/orders/final-price'                 => InStorePickup\Api\Marketplace\ApiOrdersFinalPriceResponse::class,
        'POST /api/marketplace/v3/click-collect/orders/meta/customs-declaration'    => ApiCustomsDeclarationSetResponse::class,
        'POST /api/marketplace/v3/click-collect/orders/meta/delete'                 => ApiOrdersResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/meta/details'                => InStorePickup\Api\Marketplace\ApiOrdersMetaDetailsResponse::class,
        'POST /api/marketplace/v3/click-collect/orders/meta/gtin'                   => ApiMetaSetResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/meta/imei'                   => ApiMetaSetResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/meta/info'                   => InStorePickup\Api\Marketplace\ApiOrdersMetaResponse::class,
        'POST /api/marketplace/v3/click-collect/orders/meta/sgtin'                  => ApiMetaSetResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/meta/uin'                    => ApiMetaSetResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/status/cancel'               => InStorePickup\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/status/confirm'              => InStorePickup\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/status/info'                 => InStorePickup\Api\Marketplace\ApiOrderStatusesV2::class,
        'POST /api/marketplace/v3/click-collect/orders/status/prepare'              => ApiMetaDetailsResponse::class,
        'POST /api/marketplace/v3/click-collect/orders/status/receive'              => InStorePickup\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/click-collect/orders/status/reject'               => InStorePickup\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/b2b/info'                              => ApiB2bClientInfoResponses::class,
        'POST /api/marketplace/v3/dbs/orders/final-price'                           => OrdersDbs\Api\Marketplace\ApiOrdersFinalPriceResponse::class,
        'POST /api/marketplace/v3/dbs/orders/meta/customs-declaration'              => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/meta/delete'                           => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/meta/details'                          => OrdersDbs\Api\Marketplace\ApiOrdersMetaDetailsResponse::class,
        'POST /api/marketplace/v3/dbs/orders/meta/gtin'                             => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/meta/imei'                             => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/meta/info'                             => OrdersDbs\Api\Marketplace\ApiOrdersMetaResponse::class,
        'POST /api/marketplace/v3/dbs/orders/meta/sgtin'                            => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/meta/uin'                              => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/status/cancel'                         => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/status/confirm'                        => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/status/deliver'                        => ApiStatusSetDeliverResponses::class,
        'POST /api/marketplace/v3/dbs/orders/status/info'                           => OrdersDbs\Api\Marketplace\ApiOrderStatusesV2::class,
        'POST /api/marketplace/v3/dbs/orders/status/receive'                        => PostV3DbsOrdersStatusReceiveResponse::class,
        'POST /api/marketplace/v3/dbs/orders/status/reject'                         => OrdersDbs\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbs/orders/stickers'                              => PostV3DbsOrdersStickersResponse::class,
        'POST /api/marketplace/v3/dbw/orders/client'                                => ClientInfoResp::class,
        'POST /api/marketplace/v3/dbw/orders/meta/delete'                           => PostV3DbwOrdersMetaDeleteResponse::class,
        'POST /api/marketplace/v3/dbw/orders/meta/details'                          => OrdersDbw\Api\Marketplace\ApiOrdersMetaDetailsResponse::class,
        'POST /api/marketplace/v3/dbw/orders/meta/sgtin'                            => OrdersDbw\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/dbw/orders/status/deliver'                        => OrdersDbw\Api\Marketplace\ApiStatusSetResponses::class,
        'POST /api/marketplace/v3/fbs/settings/autoreturns/items'                   => PostMarketplaceV3FbsSettingsAutoreturnsItemsResponse::class,
        'POST /api/marketplace/v3/fbs/supplies/spot/list'                           => SupplySpotDataResponse::class,
        'POST /api/marketplace/v3/orders/meta'                                      => V3OrdersMetaAPI::class,
        'POST /api/v1/acceptance/options'                                           => ModelsOptionsResultModel::class,
        'POST /api/v1/analytics/excise-report'                                      => ExciseReportResponse::class,
        'POST /api/v1/calendar/promotions/upload'                                   => PromotionUploadSuccessResponse::class,
        'POST /api/v1/documents/download/all'                                       => GetDocs::class,
        'POST /api/v1/feedbacks/answer'                                             => PostV1FeedbacksAnswerResponse::class,
        'POST /api/v1/feedbacks/order/return'                                       => PostV1FeedbacksOrderReturnResponse::class,
        'POST /api/v1/invite'                                                       => CreateInviteResponse::class,
        'POST /api/v1/seller/message'                                               => MessageResponse::class,
        'POST /api/v1/supplies'                                                     => PostV1SuppliesResponse::class,
        'POST /api/v2/list/goods/filter'                                            => ProductsResponseItemsLists::class,
        'POST /api/v2/nm-report/downloads'                                          => NmReportCreateReportResponse::class,
        'POST /api/v2/nm-report/downloads/retry'                                    => NmReportRetryReportResponse::class,
        'POST /api/v2/search-report/product/orders'                                 => PostV2SearchReportProductOrdersResponse::class,
        'POST /api/v2/search-report/product/search-texts'                           => PostV2SearchReportProductSearchTextsResponse::class,
        'POST /api/v2/search-report/report'                                         => PostV2SearchReportReportResponse::class,
        'POST /api/v2/search-report/table/details'                                  => PostV2SearchReportTableDetailsResponse::class,
        'POST /api/v2/search-report/table/groups'                                   => PostV2SearchReportTableGroupsResponse::class,
        'POST /api/v2/stocks-report/offices'                                        => PostV2StocksReportOfficesResponse::class,
        'POST /api/v2/stocks-report/products/groups'                                => PostV2StocksReportProductsGroupsResponse::class,
        'POST /api/v2/stocks-report/products/products'                              => PostV2StocksReportProductsProductsResponse::class,
        'POST /api/v2/stocks-report/products/sizes'                                 => PostV2StocksReportProductsSizesResponse::class,
        'POST /api/v2/upload/task'                                                  => ProductsSuccessTaskResponse::class,
        'POST /api/v2/upload/task/club-discount'                                    => ProductsSuccessTaskResponse::class,
        'POST /api/v2/upload/task/size'                                             => ProductsSuccessTaskResponse::class,
        'POST /api/v3/click-collect/orders/client'                                  => ApiOrderClientInfoResp::class,
        'POST /api/v3/click-collect/orders/client/identity'                         => ApiCheckedIdentity::class,
        'POST /api/v3/click-collect/orders/status'                                  => ApiOrderStatuses::class,
        'POST /api/v3/dbs/groups/info'                                              => ApiOrderGroup::class,
        'POST /api/v3/dbs/orders/client'                                            => DbsOnlyClientInfoResp::class,
        'POST /api/v3/dbs/orders/delivery-date'                                     => OrdersDbs\Api\Dbs\DeliveryDatesInfoResp::class,
        'POST /api/v3/dbs/orders/status'                                            => POSTApiV3DbsOrdersStatusResponse::class,
        'POST /api/v3/dbw/orders/courier'                                           => OrderCourierInfoResp::class,
        'POST /api/v3/dbw/orders/delivery-date'                                     => OrdersDbw\Api\Dbw\DeliveryDatesInfoResp::class,
        'POST /api/v3/dbw/orders/status'                                            => PostV3DbwOrdersStatusResponse::class,
        'POST /api/v3/dbw/orders/stickers'                                          => PostV3DbwOrdersStickersResponse::class,
        'POST /api/v3/orders/client'                                                => CrossborderTurkeyClientInfoResp::class,
        'POST /api/v3/orders/status'                                                => POSTApiV3OrdersStatusResponse::class,
        'POST /api/v3/orders/status/history'                                        => POSTApiV3OrdersStatusHistoryResponse::class,
        'POST /api/v3/orders/stickers'                                              => POSTApiV3OrdersStickersResponse::class,
        'POST /api/v3/orders/stickers/cross-border'                                 => POSTApiV3OrdersStickersCrossBorderResponse::class,
        'POST /api/v3/passes'                                                       => POSTApiV3PassesResponse::class,
        'POST /api/v3/stocks/{warehouseId}'                                         => POSTApiV3StocksWarehouseIdResponse::class,
        'POST /api/v3/supplies'                                                     => POSTApiV3SuppliesResponse::class,
        'POST /api/v3/supplies/{supplyId}/trbx'                                     => POSTApiV3SuppliesSupplyIdTrbxResponse::class,
        'POST /api/v3/supplies/{supplyId}/trbx/stickers'                            => POSTApiV3SuppliesSupplyIdTrbxStickersResponse::class,
        'POST /api/v3/test/fbs/orders/make'                                         => POSTApiV3TestFbsOrdersMakeResponse::class,
        'POST /api/v3/warehouses'                                                   => POSTApiV3WarehousesResponse::class,
        'POST /content/v2/barcodes'                                                 => POSTContentV2BarcodesResponse::class,
        'POST /content/v2/cards/delete/trash'                                       => POSTContentV2CardsDeleteTrashResponse::class,
        'POST /content/v2/cards/error/list'                                         => ResponsePublicViewerPublicErrorsTableListV2::class,
        'POST /content/v2/cards/moveNm'                                             => ResponseItemList::class,
        'POST /content/v2/cards/recover'                                            => POSTContentV2CardsRecoverResponse::class,
        'POST /content/v2/cards/update'                                             => ResponseItemList::class,
        'POST /content/v2/cards/upload'                                             => ResponseItemList::class,
        'POST /content/v2/cards/upload/add'                                         => ResponseItemList::class,
        'POST /content/v2/get/cards/list'                                           => POSTContentV2GetCardsListResponse::class,
        'POST /content/v2/get/cards/trash'                                          => POSTContentV2GetCardsTrashResponse::class,
        'POST /content/v2/tag'                                                      => ResponseContentError::class,
        'POST /content/v2/tag/nomenclature/link'                                    => ResponseContentError::class,
        'POST /content/v3/media/file'                                               => POSTContentV3MediaFileResponse::class,
        'POST /content/v3/media/save'                                               => POSTContentV3MediaSaveResponse::class,
        'PUT /adv/v0/auction/placements'                                            => PutV0AuctionPlacementsResponse::class,
        'PUT /api/marketplace/v3/fbs/supplies/{supplyId}/spot'                      => PutV3FbsSuppliesSupplyIdSpotResponse::class,
        'PUT /api/marketplace/v3/orders/{orderId}/meta/customs-declaration'         => PUTApiMarketplaceV3OrdersOrderIdMetaCustomsDeclarationResponse::class,
        'PUT /api/v1/users/access'                                                  => PutV1UsersAccessResponse::class,
        'PUT /api/v3/click-collect/orders/{orderId}/meta/gtin'                      => PUTApiV3ClickCollectOrdersOrderIdMetaGtinResponse::class,
        'PUT /api/v3/click-collect/orders/{orderId}/meta/imei'                      => PUTApiV3ClickCollectOrdersOrderIdMetaImeiResponse::class,
        'PUT /api/v3/click-collect/orders/{orderId}/meta/sgtin'                     => PUTApiV3ClickCollectOrdersOrderIdMetaSgtinResponse::class,
        'PUT /api/v3/click-collect/orders/{orderId}/meta/uin'                       => PUTApiV3ClickCollectOrdersOrderIdMetaUinResponse::class,
        'PUT /api/v3/dbs/orders/{orderId}/meta/gtin'                                => PUTApiV3DbsOrdersOrderIdMetaGtinResponse::class,
        'PUT /api/v3/dbs/orders/{orderId}/meta/imei'                                => PUTApiV3DbsOrdersOrderIdMetaImeiResponse::class,
        'PUT /api/v3/dbs/orders/{orderId}/meta/sgtin'                               => PUTApiV3DbsOrdersOrderIdMetaSgtinResponse::class,
        'PUT /api/v3/dbs/orders/{orderId}/meta/uin'                                 => PUTApiV3DbsOrdersOrderIdMetaUinResponse::class,
        'PUT /api/v3/dbw/orders/{orderId}/meta/gtin'                                => PutV3DbwOrdersOrderIdMetaGtinResponse::class,
        'PUT /api/v3/dbw/orders/{orderId}/meta/imei'                                => PutV3DbwOrdersOrderIdMetaImeiResponse::class,
        'PUT /api/v3/dbw/orders/{orderId}/meta/sgtin'                               => PUTApiV3DbwOrdersOrderIdMetaSgtinResponse::class,
        'PUT /api/v3/dbw/orders/{orderId}/meta/uin'                                 => PutV3DbwOrdersOrderIdMetaUinResponse::class,
        'PUT /api/v3/dbw/warehouses/{warehouseId}/contacts'                         => PUTApiV3DbwWarehousesWarehouseIdContactsResponse::class,
        'PUT /api/v3/orders/{orderId}/meta/expiration'                              => PUTApiV3OrdersOrderIdMetaExpirationResponse::class,
        'PUT /api/v3/orders/{orderId}/meta/gtin'                                    => PUTApiV3OrdersOrderIdMetaGtinResponse::class,
        'PUT /api/v3/orders/{orderId}/meta/imei'                                    => PUTApiV3OrdersOrderIdMetaImeiResponse::class,
        'PUT /api/v3/orders/{orderId}/meta/sgtin'                                   => PUTApiV3OrdersOrderIdMetaSgtinResponse::class,
        'PUT /api/v3/orders/{orderId}/meta/uin'                                     => PUTApiV3OrdersOrderIdMetaUinResponse::class,
        'PUT /api/v3/passes/{passId}'                                               => PUTApiV3PassesPassIdResponse::class,
        'PUT /api/v3/stocks/{warehouseId}'                                          => PUTApiV3StocksWarehouseIdResponse::class,
        'PUT /api/v3/warehouses/{warehouseId}'                                      => PUTApiV3WarehousesWarehouseIdResponse::class,
    ];

    /**
     * @var array<string, class-string<WildberriesDtoInterface>>
     */
    private const PATTERN_MAP = [
        '~^DELETE /api/v3/click\\-collect/orders/[^/]+/meta$~'                => DELETEApiV3ClickCollectOrdersOrderIdMetaResponse::class,
        '~^DELETE /api/v3/dbs/orders/[^/]+/meta$~'                            => DELETEApiV3DbsOrdersOrderIdMetaResponse::class,
        '~^DELETE /api/v3/dbw/orders/[^/]+/meta$~'                            => DELETEApiV3DbwOrdersOrderIdMetaResponse::class,
        '~^DELETE /api/v3/orders/[^/]+/meta$~'                                => DELETEApiV3OrdersOrderIdMetaResponse::class,
        '~^DELETE /api/v3/passes/[^/]+$~'                                     => DELETEApiV3PassesPassIdResponse::class,
        '~^DELETE /api/v3/stocks/[^/]+$~'                                     => DELETEApiV3StocksWarehouseIdResponse::class,
        '~^DELETE /api/v3/supplies/[^/]+$~'                                   => DELETEApiV3SuppliesSupplyIdResponse::class,
        '~^DELETE /api/v3/supplies/[^/]+/trbx$~'                              => DELETEApiV3SuppliesSupplyIdTrbxResponse::class,
        '~^DELETE /api/v3/warehouses/[^/]+$~'                                 => DELETEApiV3WarehousesWarehouseIdResponse::class,
        '~^DELETE /content/v2/tag/[^/]+$~'                                    => ResponseContentError::class,
        '~^GET /api/marketplace/v3/fbs/supplies/[^/]+/stickers/spot$~'        => SupplySpotQRCode::class,
        '~^GET /api/marketplace/v3/supplies/[^/]+/order\\-ids$~'              => V3SupplyOrderIDsAPI::class,
        '~^GET /api/v1/acceptance_report/tasks/[^/]+/download$~'              => GetV1AcceptanceReportTasksTaskIdDownloadResponse::class,
        '~^GET /api/v1/acceptance_report/tasks/[^/]+/status$~'                => GetTasksResponse::class,
        '~^GET /api/v1/paid_storage/tasks/[^/]+/download$~'                   => ResponsePaidStorage::class,
        '~^GET /api/v1/paid_storage/tasks/[^/]+/status$~'                     => GetTasksResponse::class,
        '~^GET /api/v1/seller/download/[^/]+$~'                               => GetV1SellerDownloadIdResponse::class,
        '~^GET /api/v1/supplies/[^/]+$~'                                      => ModelsSupplyDetails::class,
        '~^GET /api/v1/supplies/[^/]+/goods$~'                                => GetV1SuppliesIdGoodsResponse::class,
        '~^GET /api/v1/supplies/[^/]+/package$~'                              => GetV1SuppliesIdPackageResponse::class,
        '~^GET /api/v1/warehouse_remains/tasks/[^/]+/download$~'              => GetV1WarehouseRemainsTasksTaskIdDownloadResponse::class,
        '~^GET /api/v1/warehouse_remains/tasks/[^/]+/status$~'                => GetTasksResponse::class,
        '~^GET /api/v2/nm\\-report/downloads/file/[^/]+$~'                    => GetV2NmReportDownloadsFileDownloadIdResponse::class,
        '~^GET /api/v3/click\\-collect/orders/[^/]+/meta$~'                   => ApiOrdersMeta::class,
        '~^GET /api/v3/dbs/orders/[^/]+/meta$~'                               => GETApiV3DbsOrdersOrderIdMetaResponse::class,
        '~^GET /api/v3/dbw/orders/[^/]+/meta$~'                               => GETApiV3DbwOrdersOrderIdMetaResponse::class,
        '~^GET /api/v3/dbw/warehouses/[^/]+/contacts$~'                       => GETApiV3DbwWarehousesWarehouseIdContactsResponse::class,
        '~^GET /api/v3/supplies/[^/]+$~'                                      => Supply::class,
        '~^GET /api/v3/supplies/[^/]+/barcode$~'                              => GETApiV3SuppliesSupplyIdBarcodeResponse::class,
        '~^GET /api/v3/supplies/[^/]+/trbx$~'                                 => GETApiV3SuppliesSupplyIdTrbxResponse::class,
        '~^GET /content/v2/object/charcs/[^/]+$~'                             => GETContentV2ObjectCharcsSubjectIdResponse::class,
        '~^PATCH /api/marketplace/v3/supplies/[^/]+/orders$~'                 => PATCHApiMarketplaceV3SuppliesSupplyIdOrdersResponse::class,
        '~^PATCH /api/v3/click\\-collect/orders/[^/]+/cancel$~'               => PATCHApiV3ClickCollectOrdersOrderIdCancelResponse::class,
        '~^PATCH /api/v3/click\\-collect/orders/[^/]+/confirm$~'              => PATCHApiV3ClickCollectOrdersOrderIdConfirmResponse::class,
        '~^PATCH /api/v3/click\\-collect/orders/[^/]+/prepare$~'              => PATCHApiV3ClickCollectOrdersOrderIdPrepareResponse::class,
        '~^PATCH /api/v3/click\\-collect/orders/[^/]+/receive$~'              => PATCHApiV3ClickCollectOrdersOrderIdReceiveResponse::class,
        '~^PATCH /api/v3/click\\-collect/orders/[^/]+/reject$~'               => PATCHApiV3ClickCollectOrdersOrderIdRejectResponse::class,
        '~^PATCH /api/v3/dbs/orders/[^/]+/cancel$~'                           => PATCHApiV3DbsOrdersOrderIdCancelResponse::class,
        '~^PATCH /api/v3/dbs/orders/[^/]+/confirm$~'                          => PATCHApiV3DbsOrdersOrderIdConfirmResponse::class,
        '~^PATCH /api/v3/dbs/orders/[^/]+/deliver$~'                          => PATCHApiV3DbsOrdersOrderIdDeliverResponse::class,
        '~^PATCH /api/v3/dbs/orders/[^/]+/receive$~'                          => PATCHApiV3DbsOrdersOrderIdReceiveResponse::class,
        '~^PATCH /api/v3/dbs/orders/[^/]+/reject$~'                           => PATCHApiV3DbsOrdersOrderIdRejectResponse::class,
        '~^PATCH /api/v3/dbw/orders/[^/]+/assemble$~'                         => PATCHApiV3DbwOrdersOrderIdAssembleResponse::class,
        '~^PATCH /api/v3/dbw/orders/[^/]+/cancel$~'                           => PatchV3DbwOrdersOrderIdCancelResponse::class,
        '~^PATCH /api/v3/dbw/orders/[^/]+/confirm$~'                          => PatchV3DbwOrdersOrderIdConfirmResponse::class,
        '~^PATCH /api/v3/orders/[^/]+/cancel$~'                               => PATCHApiV3OrdersOrderIdCancelResponse::class,
        '~^PATCH /api/v3/supplies/[^/]+/deliver$~'                            => PATCHApiV3SuppliesSupplyIdDeliverResponse::class,
        '~^PATCH /api/v3/test/fbs/orders/[^/]+/decline$~'                     => PATCHApiV3TestFbsOrdersOrderIdDeclineResponse::class,
        '~^PATCH /api/v3/test/fbs/orders/[^/]+/defect$~'                      => PATCHApiV3TestFbsOrdersOrderIdDefectResponse::class,
        '~^PATCH /api/v3/test/fbs/orders/[^/]+/deliver$~'                     => PATCHApiV3TestFbsOrdersOrderIdDeliverResponse::class,
        '~^PATCH /api/v3/test/fbs/orders/[^/]+/receive$~'                     => PATCHApiV3TestFbsOrdersOrderIdReceiveResponse::class,
        '~^PATCH /api/v3/test/fbs/orders/[^/]+/reject$~'                      => PATCHApiV3TestFbsOrdersOrderIdRejectResponse::class,
        '~^PATCH /api/v3/test/fbs/supplies/[^/]+/close$~'                     => PATCHApiV3TestFbsSuppliesSupplyIdCloseResponse::class,
        '~^PATCH /content/v2/tag/[^/]+$~'                                     => ResponseContentError::class,
        '~^POST /api/finance/v1/acquiring/detailed/[^/]+$~'                   => PostV1AcquiringDetailedReportIdResponse::class,
        '~^POST /api/finance/v1/sales\\-reports/detailed/[^/]+$~'             => PostV1SalesReportsDetailedReportIdResponse::class,
        '~^POST /api/v3/stocks/[^/]+$~'                                       => POSTApiV3StocksWarehouseIdResponse::class,
        '~^POST /api/v3/supplies/[^/]+/trbx$~'                                => POSTApiV3SuppliesSupplyIdTrbxResponse::class,
        '~^POST /api/v3/supplies/[^/]+/trbx/stickers$~'                       => POSTApiV3SuppliesSupplyIdTrbxStickersResponse::class,
        '~^PUT /api/marketplace/v3/fbs/supplies/[^/]+/spot$~'                 => PutV3FbsSuppliesSupplyIdSpotResponse::class,
        '~^PUT /api/marketplace/v3/orders/[^/]+/meta/customs\\-declaration$~' => PUTApiMarketplaceV3OrdersOrderIdMetaCustomsDeclarationResponse::class,
        '~^PUT /api/v3/click\\-collect/orders/[^/]+/meta/gtin$~'              => PUTApiV3ClickCollectOrdersOrderIdMetaGtinResponse::class,
        '~^PUT /api/v3/click\\-collect/orders/[^/]+/meta/imei$~'              => PUTApiV3ClickCollectOrdersOrderIdMetaImeiResponse::class,
        '~^PUT /api/v3/click\\-collect/orders/[^/]+/meta/sgtin$~'             => PUTApiV3ClickCollectOrdersOrderIdMetaSgtinResponse::class,
        '~^PUT /api/v3/click\\-collect/orders/[^/]+/meta/uin$~'               => PUTApiV3ClickCollectOrdersOrderIdMetaUinResponse::class,
        '~^PUT /api/v3/dbs/orders/[^/]+/meta/gtin$~'                          => PUTApiV3DbsOrdersOrderIdMetaGtinResponse::class,
        '~^PUT /api/v3/dbs/orders/[^/]+/meta/imei$~'                          => PUTApiV3DbsOrdersOrderIdMetaImeiResponse::class,
        '~^PUT /api/v3/dbs/orders/[^/]+/meta/sgtin$~'                         => PUTApiV3DbsOrdersOrderIdMetaSgtinResponse::class,
        '~^PUT /api/v3/dbs/orders/[^/]+/meta/uin$~'                           => PUTApiV3DbsOrdersOrderIdMetaUinResponse::class,
        '~^PUT /api/v3/dbw/orders/[^/]+/meta/gtin$~'                          => PutV3DbwOrdersOrderIdMetaGtinResponse::class,
        '~^PUT /api/v3/dbw/orders/[^/]+/meta/imei$~'                          => PutV3DbwOrdersOrderIdMetaImeiResponse::class,
        '~^PUT /api/v3/dbw/orders/[^/]+/meta/sgtin$~'                         => PUTApiV3DbwOrdersOrderIdMetaSgtinResponse::class,
        '~^PUT /api/v3/dbw/orders/[^/]+/meta/uin$~'                           => PutV3DbwOrdersOrderIdMetaUinResponse::class,
        '~^PUT /api/v3/dbw/warehouses/[^/]+/contacts$~'                       => PUTApiV3DbwWarehousesWarehouseIdContactsResponse::class,
        '~^PUT /api/v3/orders/[^/]+/meta/expiration$~'                        => PUTApiV3OrdersOrderIdMetaExpirationResponse::class,
        '~^PUT /api/v3/orders/[^/]+/meta/gtin$~'                              => PUTApiV3OrdersOrderIdMetaGtinResponse::class,
        '~^PUT /api/v3/orders/[^/]+/meta/imei$~'                              => PUTApiV3OrdersOrderIdMetaImeiResponse::class,
        '~^PUT /api/v3/orders/[^/]+/meta/sgtin$~'                             => PUTApiV3OrdersOrderIdMetaSgtinResponse::class,
        '~^PUT /api/v3/orders/[^/]+/meta/uin$~'                               => PUTApiV3OrdersOrderIdMetaUinResponse::class,
        '~^PUT /api/v3/passes/[^/]+$~'                                        => PUTApiV3PassesPassIdResponse::class,
        '~^PUT /api/v3/stocks/[^/]+$~'                                        => PUTApiV3StocksWarehouseIdResponse::class,
        '~^PUT /api/v3/warehouses/[^/]+$~'                                    => PUTApiV3WarehousesWarehouseIdResponse::class,
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
