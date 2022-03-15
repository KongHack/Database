<?php
// source: phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/conf/config.neon
// source: /home/gamecharmer/repositories/Database/phpstan.neon
// source: array

/** @noinspection PhpParamsInspection,PhpMethodMayBeStaticInspection */

declare(strict_types=1);

class Container_170e70cc38 extends _PHPStan_ae8980142\Nette\DI\Container
{
	protected $tags = [
		'phpstan.broker.methodsClassReflectionExtension' => ['065' => true, '069' => true],
		'phpstan.broker.propertiesClassReflectionExtension' => ['066' => true, '070' => true, '0172' => true],
		'phpstan.broker.dynamicFunctionReturnTypeExtension' => [
			'0116' => true,
			'0117' => true,
			'0118' => true,
			'0119' => true,
			'0120' => true,
			'0121' => true,
			'0122' => true,
			'0123' => true,
			'0124' => true,
			'0126' => true,
			'0127' => true,
			'0128' => true,
			'0129' => true,
			'0130' => true,
			'0131' => true,
			'0132' => true,
			'0133' => true,
			'0134' => true,
			'0135' => true,
			'0136' => true,
			'0137' => true,
			'0138' => true,
			'0139' => true,
			'0140' => true,
			'0141' => true,
			'0142' => true,
			'0143' => true,
			'0147' => true,
			'0148' => true,
			'0150' => true,
			'0151' => true,
			'0153' => true,
			'0155' => true,
			'0158' => true,
			'0159' => true,
			'0160' => true,
			'0161' => true,
			'0162' => true,
			'0163' => true,
			'0164' => true,
			'0165' => true,
			'0174' => true,
			'0177' => true,
			'0178' => true,
			'0179' => true,
			'0180' => true,
			'0181' => true,
			'0183' => true,
			'0184' => true,
			'0185' => true,
			'0186' => true,
			'0187' => true,
			'0188' => true,
			'0189' => true,
			'0190' => true,
			'0191' => true,
			'0192' => true,
			'0193' => true,
			'0194' => true,
			'0195' => true,
			'0196' => true,
			'0198' => true,
			'0199' => true,
			'0200' => true,
			'0201' => true,
			'0202' => true,
			'0203' => true,
			'0204' => true,
			'0205' => true,
			'0223' => true,
			'0230' => true,
			'0231' => true,
			'0234' => true,
			'0235' => true,
			'0236' => true,
			'0237' => true,
			'0238' => true,
		],
		'phpstan.typeSpecifier.functionTypeSpecifyingExtension' => [
			'0125' => true,
			'0149' => true,
			'0175' => true,
			'0176' => true,
			'0206' => true,
			'0207' => true,
			'0208' => true,
			'0209' => true,
			'0210' => true,
			'0211' => true,
			'0212' => true,
			'0213' => true,
			'0214' => true,
			'0215' => true,
			'0216' => true,
			'0217' => true,
			'0218' => true,
			'0219' => true,
			'0220' => true,
			'0221' => true,
			'0222' => true,
			'0224' => true,
			'0225' => true,
			'0226' => true,
			'0227' => true,
			'0229' => true,
		],
		'phpstan.broker.dynamicStaticMethodReturnTypeExtension' => [
			'0144' => true,
			'0146' => true,
			'0239' => true,
			'0245' => true,
		],
		'phpstan.broker.dynamicMethodReturnTypeExtension' => [
			'0145' => true,
			'0152' => true,
			'0157' => true,
			'0174' => true,
			'0197' => true,
			'0232' => true,
			'0233' => true,
			'0239' => true,
			'0240' => true,
			'0241' => true,
			'0242' => true,
			'0243' => true,
			'0244' => true,
		],
		'phpstan.dynamicStaticMethodThrowTypeExtension' => [
			'0154' => true,
			'0156' => true,
			'0168' => true,
			'0169' => true,
			'0170' => true,
			'0171' => true,
			'0173' => true,
		],
		'phpstan.dynamicFunctionThrowTypeExtension' => ['0166' => true, '0167' => true],
		'phpstan.typeSpecifier.methodTypeSpecifyingExtension' => ['0182' => true],
		'phpstan.rules.rule' => ['rules.0' => true, 'rules.1' => true],
	];

	protected $types = ['container' => '_PHPStan_ae8980142\Nette\DI\Container'];
	protected $aliases = [];

	protected $wiring = [
		'_PHPStan_ae8980142\Nette\DI\Container' => [['container']],
		'PHPStan\Rules\Rule' => [['085', '086', '088', '089', '0102'], ['rules.0', 'rules.1']],
		'PHPStan\Rules\Debug\DumpTypeRule' => [['rules.0']],
		'PHPStan\Rules\Debug\FileAssertRule' => [['rules.1']],
		'PhpParser\BuilderFactory' => [['01']],
		'PHPStan\Parser\LexerFactory' => [['02']],
		'PhpParser\NodeVisitorAbstract' => [['03', '04', '036', '048', '056']],
		'PhpParser\NodeVisitor' => [['03', '04', '036', '048', '056']],
		'PhpParser\NodeVisitor\NameResolver' => [['03']],
		'PhpParser\NodeVisitor\NodeConnectingVisitor' => [['04']],
		'PhpParser\PrettyPrinterAbstract' => [['05']],
		'PhpParser\PrettyPrinter\Standard' => [['05']],
		'PHPStan\Broker\AnonymousClassNameHelper' => [['06']],
		'PHPStan\Php\PhpVersion' => [['07']],
		'PHPStan\Php\PhpVersionFactory' => [['08']],
		'PHPStan\Php\PhpVersionFactoryFactory' => [['09']],
		'PHPStan\PhpDocParser\Lexer\Lexer' => [['010']],
		'PHPStan\PhpDocParser\Parser\TypeParser' => [['011']],
		'PHPStan\PhpDocParser\Parser\ConstExprParser' => [['012']],
		'PHPStan\PhpDocParser\Parser\PhpDocParser' => [['013']],
		'PHPStan\PhpDoc\PhpDocInheritanceResolver' => [['014']],
		'PHPStan\PhpDoc\PhpDocNodeResolver' => [['015']],
		'PHPStan\PhpDoc\PhpDocStringResolver' => [['016']],
		'PHPStan\PhpDoc\ConstExprNodeResolver' => [['017']],
		'PHPStan\PhpDoc\TypeNodeResolver' => [['018']],
		'PHPStan\PhpDoc\TypeNodeResolverExtensionRegistryProvider' => [['019']],
		'PHPStan\PhpDoc\TypeStringResolver' => [['020']],
		'PHPStan\PhpDoc\StubValidator' => [['021']],
		'PHPStan\Analyser\Analyser' => [['022']],
		'PHPStan\Analyser\FileAnalyser' => [['023']],
		'PHPStan\Analyser\IgnoredErrorHelper' => [['024']],
		'PHPStan\Analyser\ScopeFactory' => [['025']],
		'PHPStan\Analyser\LazyScopeFactory' => [['025']],
		'PHPStan\Analyser\NodeScopeResolver' => [['026']],
		'PHPStan\Analyser\ResultCache\ResultCacheManagerFactory' => [['027']],
		'PHPStan\Analyser\ResultCache\ResultCacheClearer' => [['028']],
		'PHPStan\Cache\Cache' => [['029']],
		'PHPStan\Command\AnalyseApplication' => [['030']],
		'PHPStan\Command\AnalyserRunner' => [['031']],
		'PHPStan\Command\FixerApplication' => [['032']],
		'PHPStan\Dependency\DependencyResolver' => [['033']],
		'PHPStan\Dependency\ExportedNodeFetcher' => [['034']],
		'PHPStan\Dependency\ExportedNodeResolver' => [['035']],
		'PHPStan\Dependency\ExportedNodeVisitor' => [['036']],
		'PHPStan\DependencyInjection\Container' => [['037'], ['038']],
		'PHPStan\DependencyInjection\Nette\NetteContainer' => [['038']],
		'PHPStan\DependencyInjection\DerivativeContainerFactory' => [['039']],
		'PHPStan\DependencyInjection\Reflection\ClassReflectionExtensionRegistryProvider' => [['040']],
		'PHPStan\DependencyInjection\Type\DynamicReturnTypeExtensionRegistryProvider' => [['041']],
		'PHPStan\DependencyInjection\Type\OperatorTypeSpecifyingExtensionRegistryProvider' => [['042']],
		'PHPStan\DependencyInjection\Type\DynamicThrowTypeExtensionProvider' => [['043']],
		'PHPStan\File\FileHelper' => [['044']],
		'PHPStan\File\FileExcluderFactory' => [['045']],
		'PHPStan\File\FileExcluderRawFactory' => [['046']],
		'PHPStan\File\FileExcluder' => [2 => ['fileExcluderAnalyse', 'fileExcluderScan']],
		'PHPStan\File\FileFinder' => [2 => ['fileFinderAnalyse', 'fileFinderScan']],
		'PHPStan\File\FileMonitor' => [['047']],
		'PHPStan\NodeVisitor\StatementOrderVisitor' => [['048']],
		'PHPStan\Parallel\ParallelAnalyser' => [['049']],
		'PHPStan\Parallel\Scheduler' => [['050']],
		'PHPStan\Parser\FunctionCallStatementFinder' => [['051']],
		'PHPStan\Process\CpuCoreCounter' => [['052']],
		'PHPStan\Reflection\FunctionReflectionFactory' => [['053']],
		'PHPStan\Reflection\MethodsClassReflectionExtension' => [['054', '065', '067', '069']],
		'PHPStan\Reflection\Annotations\AnnotationsMethodsClassReflectionExtension' => [['054']],
		'PHPStan\Reflection\PropertiesClassReflectionExtension' => [['055', '066', '067', '070', '0172']],
		'PHPStan\Reflection\Annotations\AnnotationsPropertiesClassReflectionExtension' => [['055']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\CachingVisitor' => [['056']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\FileNodesFetcher' => [['057']],
		'PHPStan\BetterReflection\SourceLocator\Type\SourceLocator' => [
			0 => ['058'],
			2 => [1 => 'betterReflectionSourceLocator'],
		],
		'PHPStan\Reflection\BetterReflection\SourceLocator\AutoloadSourceLocator' => [['058']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\ComposerJsonAndInstalledJsonSourceLocatorMaker' => [['059']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorFactory' => [['060']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorRepository' => [['061']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedPsrAutoloaderLocatorFactory' => [['062']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorFactory' => [['063']],
		'PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorRepository' => [['064']],
		'PHPStan\Reflection\Mixin\MixinMethodsClassReflectionExtension' => [['065']],
		'PHPStan\Reflection\Mixin\MixinPropertiesClassReflectionExtension' => [['066']],
		'PHPStan\Reflection\Php\PhpClassReflectionExtension' => [['067']],
		'PHPStan\Reflection\Php\PhpMethodReflectionFactory' => [['068']],
		'PHPStan\Reflection\Php\Soap\SoapClientMethodsClassReflectionExtension' => [['069']],
		'PHPStan\Reflection\Php\UniversalObjectCratesClassReflectionExtension' => [['070']],
		'PHPStan\Reflection\ReflectionProvider\ReflectionProviderProvider' => [['071']],
		'PHPStan\Reflection\SignatureMap\NativeFunctionReflectionProvider' => [['072']],
		'PHPStan\Reflection\SignatureMap\SignatureMapParser' => [['073']],
		'PHPStan\Reflection\SignatureMap\SignatureMapProvider' => [['077'], ['074', '075']],
		'PHPStan\Reflection\SignatureMap\FunctionSignatureMapProvider' => [['074']],
		'PHPStan\Reflection\SignatureMap\Php8SignatureMapProvider' => [['075']],
		'PHPStan\Reflection\SignatureMap\SignatureMapProviderFactory' => [['076']],
		'PHPStan\Rules\Api\ApiRuleHelper' => [['078']],
		'PHPStan\Rules\AttributesCheck' => [['079']],
		'PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchCheck' => [['080']],
		'PHPStan\Rules\ClassCaseSensitivityCheck' => [['081']],
		'PHPStan\Rules\Comparison\ConstantConditionRuleHelper' => [['082']],
		'PHPStan\Rules\Comparison\ImpossibleCheckTypeHelper' => [['083']],
		'PHPStan\Rules\Exceptions\ExceptionTypeResolver' => [1 => ['084'], [1 => 'exceptionTypeResolver']],
		'PHPStan\Rules\Exceptions\DefaultExceptionTypeResolver' => [['084']],
		'PHPStan\Rules\Exceptions\MissingCheckedExceptionInFunctionThrowsRule' => [['085']],
		'PHPStan\Rules\Exceptions\MissingCheckedExceptionInMethodThrowsRule' => [['086']],
		'PHPStan\Rules\Exceptions\MissingCheckedExceptionInThrowsCheck' => [['087']],
		'PHPStan\Rules\Exceptions\TooWideFunctionThrowTypeRule' => [['088']],
		'PHPStan\Rules\Exceptions\TooWideMethodThrowTypeRule' => [['089']],
		'PHPStan\Rules\Exceptions\TooWideThrowTypeCheck' => [['090']],
		'PHPStan\Rules\FunctionCallParametersCheck' => [['091']],
		'PHPStan\Rules\FunctionDefinitionCheck' => [['092']],
		'PHPStan\Rules\FunctionReturnTypeCheck' => [['093']],
		'PHPStan\Rules\Generics\CrossCheckInterfacesHelper' => [['094']],
		'PHPStan\Rules\Generics\GenericAncestorsCheck' => [['095']],
		'PHPStan\Rules\Generics\GenericObjectTypeCheck' => [['096']],
		'PHPStan\Rules\Generics\TemplateTypeCheck' => [['097']],
		'PHPStan\Rules\Generics\VarianceCheck' => [['098']],
		'PHPStan\Rules\IssetCheck' => [['099']],
		'PHPStan\Rules\Methods\MethodCallCheck' => [['0100']],
		'PHPStan\Rules\Methods\StaticMethodCallCheck' => [['0101']],
		'PHPStan\Rules\Methods\MethodSignatureRule' => [['0102']],
		'PHPStan\Rules\MissingTypehintCheck' => [['0103']],
		'PHPStan\Rules\NullsafeCheck' => [['0104']],
		'PHPStan\Rules\Constants\AlwaysUsedClassConstantsExtensionProvider' => [['0105']],
		'PHPStan\Rules\Constants\LazyAlwaysUsedClassConstantsExtensionProvider' => [['0105']],
		'PHPStan\Rules\PhpDoc\UnresolvableTypeHelper' => [['0106']],
		'PHPStan\Rules\Properties\ReadWritePropertiesExtensionProvider' => [['0107']],
		'PHPStan\Rules\Properties\LazyReadWritePropertiesExtensionProvider' => [['0107']],
		'PHPStan\Rules\Properties\PropertyDescriptor' => [['0108']],
		'PHPStan\Rules\Properties\PropertyReflectionFinder' => [['0109']],
		'PHPStan\Rules\RegistryFactory' => [['0110']],
		'PHPStan\Rules\RuleLevelHelper' => [['0111']],
		'PHPStan\Rules\UnusedFunctionParametersCheck' => [['0112']],
		'PHPStan\Type\FileTypeMapper' => [['0113']],
		'PHPStan\Type\TypeAliasResolver' => [['0114']],
		'PHPStan\Type\TypeAliasResolverProvider' => [['0115']],
		'PHPStan\Type\DynamicFunctionReturnTypeExtension' => [
			[
				'0116',
				'0117',
				'0118',
				'0119',
				'0120',
				'0121',
				'0122',
				'0123',
				'0124',
				'0126',
				'0127',
				'0128',
				'0129',
				'0130',
				'0131',
				'0132',
				'0133',
				'0134',
				'0135',
				'0136',
				'0137',
				'0138',
				'0139',
				'0140',
				'0141',
				'0142',
				'0143',
				'0147',
				'0148',
				'0150',
				'0151',
				'0153',
				'0155',
				'0158',
				'0159',
				'0160',
				'0161',
				'0162',
				'0163',
				'0164',
				'0165',
				'0174',
				'0177',
				'0178',
				'0179',
				'0180',
				'0181',
				'0183',
				'0184',
				'0185',
				'0186',
				'0187',
				'0188',
				'0189',
				'0190',
				'0191',
				'0192',
				'0193',
				'0194',
				'0195',
				'0196',
				'0198',
				'0199',
				'0200',
				'0201',
				'0202',
				'0203',
				'0204',
				'0205',
				'0223',
				'0230',
				'0231',
				'0234',
				'0235',
				'0236',
				'0237',
				'0238',
			],
		],
		'PHPStan\Type\Php\ArgumentBasedFunctionReturnTypeExtension' => [['0116']],
		'PHPStan\Type\Php\ArrayColumnFunctionReturnTypeExtension' => [['0117']],
		'PHPStan\Type\Php\ArrayCombineFunctionReturnTypeExtension' => [['0118']],
		'PHPStan\Type\Php\ArrayCurrentDynamicReturnTypeExtension' => [['0119']],
		'PHPStan\Type\Php\ArrayFillFunctionReturnTypeExtension' => [['0120']],
		'PHPStan\Type\Php\ArrayFillKeysFunctionReturnTypeExtension' => [['0121']],
		'PHPStan\Type\Php\ArrayFilterFunctionReturnTypeReturnTypeExtension' => [['0122']],
		'PHPStan\Type\Php\ArrayFlipFunctionReturnTypeExtension' => [['0123']],
		'PHPStan\Type\Php\ArrayKeyDynamicReturnTypeExtension' => [['0124']],
		'PHPStan\Type\FunctionTypeSpecifyingExtension' => [
			[
				'0125',
				'0149',
				'0175',
				'0176',
				'0206',
				'0207',
				'0208',
				'0209',
				'0210',
				'0211',
				'0212',
				'0213',
				'0214',
				'0215',
				'0216',
				'0217',
				'0218',
				'0219',
				'0220',
				'0221',
				'0222',
				'0224',
				'0225',
				'0226',
				'0227',
				'0229',
			],
		],
		'PHPStan\Analyser\TypeSpecifierAwareExtension' => [
			[
				'0125',
				'0149',
				'0175',
				'0176',
				'0182',
				'0206',
				'0207',
				'0208',
				'0209',
				'0210',
				'0211',
				'0212',
				'0213',
				'0214',
				'0215',
				'0216',
				'0217',
				'0218',
				'0219',
				'0220',
				'0221',
				'0222',
				'0224',
				'0225',
				'0226',
				'0227',
				'0229',
				'0231',
			],
		],
		'PHPStan\Type\Php\ArrayKeyExistsFunctionTypeSpecifyingExtension' => [['0125']],
		'PHPStan\Type\Php\ArrayKeyFirstDynamicReturnTypeExtension' => [['0126']],
		'PHPStan\Type\Php\ArrayKeyLastDynamicReturnTypeExtension' => [['0127']],
		'PHPStan\Type\Php\ArrayKeysFunctionDynamicReturnTypeExtension' => [['0128']],
		'PHPStan\Type\Php\ArrayMapFunctionReturnTypeExtension' => [['0129']],
		'PHPStan\Type\Php\ArrayMergeFunctionDynamicReturnTypeExtension' => [['0130']],
		'PHPStan\Type\Php\ArrayNextDynamicReturnTypeExtension' => [['0131']],
		'PHPStan\Type\Php\ArrayPopFunctionReturnTypeExtension' => [['0132']],
		'PHPStan\Type\Php\ArrayRandFunctionReturnTypeExtension' => [['0133']],
		'PHPStan\Type\Php\ArrayReduceFunctionReturnTypeExtension' => [['0134']],
		'PHPStan\Type\Php\ArrayReverseFunctionReturnTypeExtension' => [['0135']],
		'PHPStan\Type\Php\ArrayShiftFunctionReturnTypeExtension' => [['0136']],
		'PHPStan\Type\Php\ArraySliceFunctionReturnTypeExtension' => [['0137']],
		'PHPStan\Type\Php\ArraySpliceFunctionReturnTypeExtension' => [['0138']],
		'PHPStan\Type\Php\ArraySearchFunctionDynamicReturnTypeExtension' => [['0139']],
		'PHPStan\Type\Php\ArrayValuesFunctionDynamicReturnTypeExtension' => [['0140']],
		'PHPStan\Type\Php\ArraySumFunctionDynamicReturnTypeExtension' => [['0141']],
		'PHPStan\Type\Php\Base64DecodeDynamicFunctionReturnTypeExtension' => [['0142']],
		'PHPStan\Type\Php\BcMathStringOrNullReturnTypeExtension' => [['0143']],
		'PHPStan\Type\DynamicStaticMethodReturnTypeExtension' => [['0144', '0146', '0239', '0245']],
		'PHPStan\Type\Php\ClosureBindDynamicReturnTypeExtension' => [['0144']],
		'PHPStan\Type\DynamicMethodReturnTypeExtension' => [
			['0145', '0152', '0157', '0174', '0197', '0232', '0233', '0239', '0240', '0241', '0242', '0243', '0244'],
		],
		'PHPStan\Type\Php\ClosureBindToDynamicReturnTypeExtension' => [['0145']],
		'PHPStan\Type\Php\ClosureFromCallableDynamicReturnTypeExtension' => [['0146']],
		'PHPStan\Type\Php\CompactFunctionReturnTypeExtension' => [['0147']],
		'PHPStan\Type\Php\CountFunctionReturnTypeExtension' => [['0148']],
		'PHPStan\Type\Php\CountFunctionTypeSpecifyingExtension' => [['0149']],
		'PHPStan\Type\Php\CurlInitReturnTypeExtension' => [['0150']],
		'PHPStan\Type\Php\DateFormatFunctionReturnTypeExtension' => [['0151']],
		'PHPStan\Type\Php\DateFormatMethodReturnTypeExtension' => [['0152']],
		'PHPStan\Type\Php\DateFunctionReturnTypeExtension' => [['0153']],
		'PHPStan\Type\DynamicStaticMethodThrowTypeExtension' => [['0154', '0156', '0168', '0169', '0170', '0171', '0173']],
		'PHPStan\Type\Php\DateIntervalConstructorThrowTypeExtension' => [['0154']],
		'PHPStan\Type\Php\DateTimeDynamicReturnTypeExtension' => [['0155']],
		'PHPStan\Type\Php\DateTimeConstructorThrowTypeExtension' => [['0156']],
		'PHPStan\Type\Php\DsMapDynamicReturnTypeExtension' => [['0157']],
		'PHPStan\Type\Php\DioStatDynamicFunctionReturnTypeExtension' => [['0158']],
		'PHPStan\Type\Php\ExplodeFunctionDynamicReturnTypeExtension' => [['0159']],
		'PHPStan\Type\Php\FilterVarDynamicReturnTypeExtension' => [['0160']],
		'PHPStan\Type\Php\GetCalledClassDynamicReturnTypeExtension' => [['0161']],
		'PHPStan\Type\Php\GetClassDynamicReturnTypeExtension' => [['0162']],
		'PHPStan\Type\Php\GetParentClassDynamicFunctionReturnTypeExtension' => [['0163']],
		'PHPStan\Type\Php\GettimeofdayDynamicFunctionReturnTypeExtension' => [['0164']],
		'PHPStan\Type\Php\HashFunctionsReturnTypeExtension' => [['0165']],
		'PHPStan\Type\DynamicFunctionThrowTypeExtension' => [['0166', '0167']],
		'PHPStan\Type\Php\IntdivThrowTypeExtension' => [['0166']],
		'PHPStan\Type\Php\JsonThrowTypeExtension' => [['0167']],
		'PHPStan\Type\Php\ReflectionClassConstructorThrowTypeExtension' => [['0168']],
		'PHPStan\Type\Php\ReflectionFunctionConstructorThrowTypeExtension' => [['0169']],
		'PHPStan\Type\Php\ReflectionMethodConstructorThrowTypeExtension' => [['0170']],
		'PHPStan\Type\Php\ReflectionPropertyConstructorThrowTypeExtension' => [['0171']],
		'PHPStan\Type\Php\SimpleXMLElementClassPropertyReflectionExtension' => [['0172']],
		'PHPStan\Type\Php\SimpleXMLElementConstructorThrowTypeExtension' => [['0173']],
		'PHPStan\Type\Php\StatDynamicReturnTypeExtension' => [['0174']],
		'PHPStan\Type\Php\MethodExistsTypeSpecifyingExtension' => [['0175']],
		'PHPStan\Type\Php\PropertyExistsTypeSpecifyingExtension' => [['0176']],
		'PHPStan\Type\Php\MinMaxFunctionReturnTypeExtension' => [['0177']],
		'PHPStan\Type\Php\NumberFormatFunctionDynamicReturnTypeExtension' => [['0178']],
		'PHPStan\Type\Php\PathinfoFunctionDynamicReturnTypeExtension' => [['0179']],
		'PHPStan\Type\Php\PregFilterFunctionReturnTypeExtension' => [['0180']],
		'PHPStan\Type\Php\PregSplitDynamicReturnTypeExtension' => [['0181']],
		'PHPStan\Type\MethodTypeSpecifyingExtension' => [['0182']],
		'PHPStan\Type\Php\ReflectionClassIsSubclassOfTypeSpecifyingExtension' => [['0182']],
		'PHPStan\Type\Php\ReplaceFunctionsDynamicReturnTypeExtension' => [['0183']],
		'PHPStan\Type\Php\ArrayPointerFunctionsDynamicReturnTypeExtension' => [['0184']],
		'PHPStan\Type\Php\VarExportFunctionDynamicReturnTypeExtension' => [['0185']],
		'PHPStan\Type\Php\MbFunctionsReturnTypeExtension' => [['0186']],
		'PHPStan\Type\Php\MbConvertEncodingFunctionReturnTypeExtension' => [['0187']],
		'PHPStan\Type\Php\MbSubstituteCharacterDynamicReturnTypeExtension' => [['0188']],
		'PHPStan\Type\Php\MicrotimeFunctionReturnTypeExtension' => [['0189']],
		'PHPStan\Type\Php\HrtimeFunctionReturnTypeExtension' => [['0190']],
		'PHPStan\Type\Php\ImplodeFunctionReturnTypeExtension' => [['0191']],
		'PHPStan\Type\Php\NonEmptyStringFunctionsReturnTypeExtension' => [['0192']],
		'PHPStan\Type\Php\StrlenFunctionReturnTypeExtension' => [['0193']],
		'PHPStan\Type\Php\StrPadFunctionReturnTypeExtension' => [['0194']],
		'PHPStan\Type\Php\StrRepeatFunctionReturnTypeExtension' => [['0195']],
		'PHPStan\Type\Php\SubstrDynamicReturnTypeExtension' => [['0196']],
		'PHPStan\Type\Php\ThrowableReturnTypeExtension' => [['0197']],
		'PHPStan\Type\Php\ParseUrlFunctionDynamicReturnTypeExtension' => [['0198']],
		'PHPStan\Type\Php\TriggerErrorDynamicReturnTypeExtension' => [['0199']],
		'PHPStan\Type\Php\VersionCompareFunctionDynamicReturnTypeExtension' => [['0200']],
		'PHPStan\Type\Php\PowFunctionReturnTypeExtension' => [['0201']],
		'PHPStan\Type\Php\RoundFunctionReturnTypeExtension' => [['0202']],
		'PHPStan\Type\Php\StrtotimeFunctionReturnTypeExtension' => [['0203']],
		'PHPStan\Type\Php\RandomIntFunctionReturnTypeExtension' => [['0204']],
		'PHPStan\Type\Php\RangeFunctionReturnTypeExtension' => [['0205']],
		'PHPStan\Type\Php\AssertFunctionTypeSpecifyingExtension' => [['0206']],
		'PHPStan\Type\Php\ClassExistsFunctionTypeSpecifyingExtension' => [['0207']],
		'PHPStan\Type\Php\DefineConstantTypeSpecifyingExtension' => [['0208']],
		'PHPStan\Type\Php\DefinedConstantTypeSpecifyingExtension' => [['0209']],
		'PHPStan\Type\Php\FunctionExistsFunctionTypeSpecifyingExtension' => [['0210']],
		'PHPStan\Type\Php\InArrayFunctionTypeSpecifyingExtension' => [['0211']],
		'PHPStan\Type\Php\IsIntFunctionTypeSpecifyingExtension' => [['0212']],
		'PHPStan\Type\Php\IsFloatFunctionTypeSpecifyingExtension' => [['0213']],
		'PHPStan\Type\Php\IsNullFunctionTypeSpecifyingExtension' => [['0214']],
		'PHPStan\Type\Php\IsArrayFunctionTypeSpecifyingExtension' => [['0215']],
		'PHPStan\Type\Php\IsBoolFunctionTypeSpecifyingExtension' => [['0216']],
		'PHPStan\Type\Php\IsCallableFunctionTypeSpecifyingExtension' => [['0217']],
		'PHPStan\Type\Php\IsCountableFunctionTypeSpecifyingExtension' => [['0218']],
		'PHPStan\Type\Php\IsResourceFunctionTypeSpecifyingExtension' => [['0219']],
		'PHPStan\Type\Php\IsIterableFunctionTypeSpecifyingExtension' => [['0220']],
		'PHPStan\Type\Php\IsStringFunctionTypeSpecifyingExtension' => [['0221']],
		'PHPStan\Type\Php\IsSubclassOfFunctionTypeSpecifyingExtension' => [['0222']],
		'PHPStan\Type\Php\IteratorToArrayFunctionReturnTypeExtension' => [['0223']],
		'PHPStan\Type\Php\IsObjectFunctionTypeSpecifyingExtension' => [['0224']],
		'PHPStan\Type\Php\IsNumericFunctionTypeSpecifyingExtension' => [['0225']],
		'PHPStan\Type\Php\IsScalarFunctionTypeSpecifyingExtension' => [['0226']],
		'PHPStan\Type\Php\IsAFunctionTypeSpecifyingExtension' => [['0227']],
		'PHPStan\Type\Php\IsAFunctionTypeSpecifyingHelper' => [['0228']],
		'PHPStan\Type\Php\ArrayIsListFunctionTypeSpecifyingExtension' => [['0229']],
		'PHPStan\Type\Php\JsonThrowOnErrorDynamicReturnTypeExtension' => [['0230']],
		'PHPStan\Type\Php\TypeSpecifyingFunctionsDynamicReturnTypeExtension' => [['0231']],
		'PHPStan\Type\Php\SimpleXMLElementAsXMLMethodReturnTypeExtension' => [['0232']],
		'PHPStan\Type\Php\SimpleXMLElementXpathMethodReturnTypeExtension' => [['0233']],
		'PHPStan\Type\Php\StrSplitFunctionReturnTypeExtension' => [['0234']],
		'PHPStan\Type\Php\StrTokFunctionReturnTypeExtension' => [['0235']],
		'PHPStan\Type\Php\SprintfFunctionDynamicReturnTypeExtension' => [['0236']],
		'PHPStan\Type\Php\StrvalFamilyFunctionReturnTypeExtension' => [['0237']],
		'PHPStan\Type\Php\StrWordCountFunctionDynamicReturnTypeExtension' => [['0238']],
		'PHPStan\Type\Php\XMLReaderOpenReturnTypeExtension' => [['0239']],
		'PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension' => [['0240', '0241', '0242', '0243', '0244']],
		'PHPStan\Type\Php\DatePeriodConstructorReturnTypeExtension' => [['0245']],
		'PHPStan\Analyser\TypeSpecifier' => [['typeSpecifier']],
		'PHPStan\Analyser\TypeSpecifierFactory' => [['typeSpecifierFactory']],
		'PHPStan\File\RelativePathHelper' => [
			0 => ['relativePathHelper'],
			2 => [1 => 'simpleRelativePathHelper', 'parentDirectoryRelativePathHelper'],
		],
		'PHPStan\File\ParentDirectoryRelativePathHelper' => [2 => ['parentDirectoryRelativePathHelper']],
		'PHPStan\Reflection\ReflectionProvider' => [
			['reflectionProvider'],
			['broker', 'innerRuntimeReflectionProvider'],
			[2 => 'betterReflectionProvider', 'runtimeReflectionProvider'],
		],
		'PHPStan\Broker\Broker' => [['broker']],
		'PHPStan\Broker\BrokerFactory' => [['brokerFactory']],
		'PHPStan\Cache\CacheStorage' => [2 => ['cacheStorage']],
		'PHPStan\Cache\FileCacheStorage' => [2 => ['cacheStorage']],
		'PHPStan\Parser\Parser' => [
			2 => [
				'currentPhpVersionRichParser',
				'currentPhpVersionSimpleParser',
				'currentPhpVersionSimpleDirectParser',
				'defaultAnalysisParser',
				'php8Parser',
				'pathRoutingParser',
			],
		],
		'PHPStan\Parser\RichParser' => [2 => ['currentPhpVersionRichParser']],
		'PHPStan\Parser\CleaningParser' => [2 => ['currentPhpVersionSimpleParser']],
		'PHPStan\Parser\SimpleParser' => [2 => ['currentPhpVersionSimpleDirectParser', 'php8Parser']],
		'PHPStan\Parser\CachedParser' => [2 => ['defaultAnalysisParser']],
		'PhpParser\Parser' => [2 => ['phpParserDecorator', 'currentPhpVersionPhpParser', 'php8PhpParser']],
		'PHPStan\Parser\PhpParserDecorator' => [2 => ['phpParserDecorator']],
		'PhpParser\Lexer' => [2 => ['currentPhpVersionLexer', 'php8Lexer']],
		'PhpParser\ParserAbstract' => [2 => ['currentPhpVersionPhpParser', 'php8PhpParser']],
		'PhpParser\Parser\Php7' => [2 => ['currentPhpVersionPhpParser', 'php8PhpParser']],
		'PHPStan\Rules\Registry' => [['registry']],
		'PHPStan\PhpDoc\StubPhpDocProvider' => [['stubPhpDocProvider']],
		'PHPStan\Reflection\ReflectionProvider\ReflectionProviderFactory' => [['reflectionProviderFactory']],
		'PHPStan\BetterReflection\Reflector\Reflector' => [
			0 => ['originalBetterReflectionReflector'],
			2 => [
				1 => 'betterReflectionReflector',
				'betterReflectionClassReflector',
				'betterReflectionFunctionReflector',
				'betterReflectionConstantReflector',
				'nodeScopeResolverReflector',
			],
		],
		'PHPStan\BetterReflection\Reflector\DefaultReflector' => [['originalBetterReflectionReflector']],
		'PHPStan\Reflection\BetterReflection\Reflector\MemoizingReflector' => [
			2 => ['betterReflectionReflector', 'nodeScopeResolverReflector'],
		],
		'PHPStan\BetterReflection\Reflector\ClassReflector' => [2 => ['betterReflectionClassReflector']],
		'PHPStan\BetterReflection\Reflector\FunctionReflector' => [2 => ['betterReflectionFunctionReflector']],
		'PHPStan\BetterReflection\Reflector\ConstantReflector' => [2 => ['betterReflectionConstantReflector']],
		'PHPStan\Reflection\BetterReflection\BetterReflectionProvider' => [2 => ['betterReflectionProvider']],
		'PHPStan\Reflection\ReflectionProvider\ClassBlacklistReflectionProvider' => [2 => ['runtimeReflectionProvider']],
		'PHPStan\Reflection\Runtime\RuntimeReflectionProvider' => [['innerRuntimeReflectionProvider']],
		'PHPStan\Reflection\BetterReflection\BetterReflectionSourceLocatorFactory' => [['0246']],
		'PHPStan\Reflection\BetterReflection\BetterReflectionProviderFactory' => [['0247']],
		'PHPStan\Reflection\BetterReflection\SourceStubber\PhpStormStubsSourceStubberFactory' => [['0248']],
		'PHPStan\BetterReflection\SourceLocator\SourceStubber\SourceStubber' => [1 => ['0249', '0250']],
		'PHPStan\BetterReflection\SourceLocator\SourceStubber\PhpStormStubsSourceStubber' => [['0249']],
		'PHPStan\BetterReflection\SourceLocator\SourceStubber\ReflectionSourceStubber' => [['0250']],
		'PhpParser\Lexer\Emulative' => [2 => ['php8Lexer']],
		'PHPStan\Parser\PathRoutingParser' => [2 => ['pathRoutingParser']],
		'PHPStan\Command\ErrorFormatter\ErrorFormatter' => [
			[
				'errorFormatter.raw',
				'errorFormatter.table',
				'errorFormatter.checkstyle',
				'errorFormatter.json',
				'errorFormatter.junit',
				'errorFormatter.prettyJson',
				'errorFormatter.gitlab',
				'errorFormatter.github',
				'errorFormatter.teamcity',
			],
		],
		'PHPStan\Command\ErrorFormatter\RawErrorFormatter' => [['errorFormatter.raw']],
		'PHPStan\Command\ErrorFormatter\TableErrorFormatter' => [['errorFormatter.table']],
		'PHPStan\Command\ErrorFormatter\CheckstyleErrorFormatter' => [['errorFormatter.checkstyle']],
		'PHPStan\Command\ErrorFormatter\JsonErrorFormatter' => [['errorFormatter.json', 'errorFormatter.prettyJson']],
		'PHPStan\Command\ErrorFormatter\JunitErrorFormatter' => [['errorFormatter.junit']],
		'PHPStan\Command\ErrorFormatter\GitlabErrorFormatter' => [['errorFormatter.gitlab']],
		'PHPStan\Command\ErrorFormatter\GithubErrorFormatter' => [['errorFormatter.github']],
		'PHPStan\Command\ErrorFormatter\TeamcityErrorFormatter' => [['errorFormatter.teamcity']],
	];


	public function __construct(array $params = [])
	{
		parent::__construct($params);
		$this->parameters += [
			'stubFiles' => [
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionAttribute.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionClass.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionClassConstant.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionFunctionAbstract.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionParameter.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionProperty.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/iterable.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ArrayObject.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/WeakReference.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ext-ds.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/PDOStatement.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/date.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/mysqli.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/zip.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/dom.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/spl.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/SplObjectStorage.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/Exception.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/arrayFunctions.stub',
			],
			'bootstrapFiles' => [
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionUnionType.php',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionAttribute.php',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/Attribute.php',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionIntersectionType.php',
			],
			'excludes_analyse' => [],
			'excludePaths' => [
				'analyseAndScan' => ['/home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/../../../src/Generated/*'],
				'analyse' => [],
			],
			'level' => null,
			'paths' => [],
			'exceptions' => [
				'implicitThrows' => true,
				'uncheckedExceptionRegexes' => [],
				'uncheckedExceptionClasses' => [],
				'checkedExceptionRegexes' => [],
				'checkedExceptionClasses' => [],
				'check' => ['missingCheckedExceptionInThrows' => false, 'tooWideThrowType' => false],
			],
			'featureToggles' => [
				'bleedingEdge' => false,
				'disableRuntimeReflectionProvider' => false,
				'skipCheckGenericClasses' => [
					'DatePeriod',
					'CallbackFilterIterator',
					'FilterIterator',
					'RecursiveCallbackFilterIterator',
				],
				'explicitMixedInUnknownGenericNew' => false,
			],
			'fileExtensions' => ['php'],
			'checkAdvancedIsset' => false,
			'checkAlwaysTrueCheckTypeFunctionCall' => false,
			'checkAlwaysTrueInstanceof' => false,
			'checkAlwaysTrueStrictComparison' => false,
			'checkClassCaseSensitivity' => false,
			'checkExplicitMixed' => false,
			'checkFunctionArgumentTypes' => false,
			'checkFunctionNameCase' => false,
			'checkGenericClassInNonGenericObjectType' => false,
			'checkInternalClassCaseSensitivity' => false,
			'checkMissingIterableValueType' => false,
			'checkMissingCallableSignature' => false,
			'checkMissingVarTagTypehint' => false,
			'checkArgumentsPassedByReference' => false,
			'checkMaybeUndefinedVariables' => false,
			'checkNullables' => false,
			'checkThisOnly' => true,
			'checkUnionTypes' => false,
			'checkExplicitMixedMissingReturn' => false,
			'checkPhpDocMissingReturn' => false,
			'checkPhpDocMethodSignatures' => false,
			'checkExtraArguments' => false,
			'checkMissingTypehints' => false,
			'checkTooWideReturnTypesInProtectedAndPublicMethods' => false,
			'checkUninitializedProperties' => false,
			'inferPrivatePropertyTypeFromConstructor' => false,
			'reportMaybes' => false,
			'reportMaybesInMethodSignatures' => false,
			'reportMaybesInPropertyPhpDocTypes' => false,
			'reportStaticMethodSignatures' => false,
			'mixinExcludeClasses' => [],
			'scanFiles' => [],
			'scanDirectories' => [],
			'parallel' => [
				'jobSize' => 20,
				'processTimeout' => 3000.0,
				'maximumNumberOfProcesses' => 1,
				'minimumNumberOfJobsPerProcess' => 2,
				'buffer' => 134217728,
			],
			'phpVersion' => null,
			'polluteScopeWithLoopInitialAssignments' => true,
			'polluteScopeWithAlwaysIterableForeach' => true,
			'propertyAlwaysWrittenTags' => [],
			'propertyAlwaysReadTags' => [],
			'additionalConstructors' => [],
			'treatPhpDocTypesAsCertain' => true,
			'tipsOfTheDay' => false,
			'reportMagicMethods' => false,
			'reportMagicProperties' => false,
			'ignoreErrors' => [],
			'internalErrorsCountLimit' => 50,
			'cache' => ['nodesByFileCountMax' => 1024, 'nodesByStringCountMax' => 1024],
			'reportUnmatchedIgnoredErrors' => true,
			'scopeClass' => 'PHPStan\Analyser\MutatingScope',
			'typeAliases' => [],
			'universalObjectCratesClasses' => ['stdClass'],
			'earlyTerminatingMethodCalls' => [],
			'earlyTerminatingFunctionCalls' => [],
			'memoryLimitFile' => '/home/gamecharmer/repositories/Database/stantmp/.memory_limit',
			'tempResultCachePath' => '/home/gamecharmer/repositories/Database/stantmp/resultCaches',
			'resultCachePath' => '/home/gamecharmer/repositories/Database/stantmp/resultCache.php',
			'resultCacheChecksProjectExtensionFilesDependencies' => false,
			'staticReflectionClassNamePatterns' => [
				'#^PhpParser\\\#i',
				'#^PHPStan\\\#i',
				'#^Hoa\\\#i',
				'#^Symfony\\\Polyfill\\\Php80\\\#i',
				'#^Symfony\\\Polyfill\\\Mbstring\\\#i',
				'#^Symfony\\\Polyfill\\\Intl\\\Normalizer\\\#i',
				'#^Symfony\\\Polyfill\\\Php73\\\#i',
				'#^Symfony\\\Polyfill\\\Php74\\\#i',
				'#^Symfony\\\Polyfill\\\Php72\\\#i',
				'#^Symfony\\\Polyfill\\\Intl\\\Grapheme\\\#i',
				'#^Composer\\\#i',
				'#^ReflectionUnionType$#i',
				'#^Attribute$#i',
				'#^ReturnTypeWillChange$#i',
				'#^ReflectionIntersectionType$#i',
				'#^UnitEnum$#i',
				'#^BackedEnum$#i',
				'#^ReflectionEnum$#i',
				'#^ReflectionEnumUnitCase$#i',
				'#^ReflectionEnumBackedCase$#i',
			],
			'dynamicConstantNames' => [
				'ICONV_IMPL',
				'LIBXML_VERSION',
				'LIBXML_DOTTED_VERSION',
				'PHP_VERSION',
				'PHP_MAJOR_VERSION',
				'PHP_MINOR_VERSION',
				'PHP_RELEASE_VERSION',
				'PHP_VERSION_ID',
				'PHP_EXTRA_VERSION',
				'PHP_WINDOWS_VERSION_MAJOR',
				'PHP_WINDOWS_VERSION_MINOR',
				'PHP_WINDOWS_VERSION_BUILD',
				'PHP_ZTS',
				'PHP_DEBUG',
				'PHP_MAXPATHLEN',
				'PHP_OS',
				'PHP_OS_FAMILY',
				'PHP_SAPI',
				'PHP_EOL',
				'PHP_INT_MAX',
				'PHP_INT_MIN',
				'PHP_INT_SIZE',
				'PHP_FLOAT_DIG',
				'PHP_FLOAT_EPSILON',
				'PHP_FLOAT_MIN',
				'PHP_FLOAT_MAX',
				'DEFAULT_INCLUDE_PATH',
				'PEAR_INSTALL_DIR',
				'PEAR_EXTENSION_DIR',
				'PHP_EXTENSION_DIR',
				'PHP_PREFIX',
				'PHP_BINDIR',
				'PHP_BINARY',
				'PHP_MANDIR',
				'PHP_LIBDIR',
				'PHP_DATADIR',
				'PHP_SYSCONFDIR',
				'PHP_LOCALSTATEDIR',
				'PHP_CONFIG_FILE_PATH',
				'PHP_CONFIG_FILE_SCAN_DIR',
				'PHP_SHLIB_SUFFIX',
				'PHP_FD_SETSIZE',
				'OPENSSL_VERSION_NUMBER',
				'ZEND_DEBUG_BUILD',
				'ZEND_THREAD_SAFE',
			],
			'customRulesetUsed' => null,
			'editorUrl' => null,
			'__validate' => true,
			'tmpDir' => '/home/gamecharmer/repositories/Database/stantmp',
			'debugMode' => true,
			'productionMode' => false,
			'tempDir' => '/home/gamecharmer/repositories/Database/stantmp',
			'rootDir' => '/home/gamecharmer/repositories/Database/vendor/phpstan/phpstan',
			'currentWorkingDirectory' => '/home/gamecharmer/repositories/Database',
			'cliArgumentsVariablesRegistered' => true,
			'additionalConfigFiles' => ['/home/gamecharmer/repositories/Database/phpstan.neon'],
			'composerAutoloaderProjectPaths' => [
				'/home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/..',
				'/home/gamecharmer/repositories/Database',
			],
			'generateBaselineFile' => null,
			'usedLevel' => '0',
			'cliAutoloadFile' => null,
			'fixerTmpDir' => '/tmp/phpstan-fixer',
			'singleReflectionFile' => null,
			'singleReflectionInsteadOfFile' => null,
			'analysedPaths' => null,
			'analysedPathsFromConfig' => null,
		];
	}


	public function createService01(): PhpParser\BuilderFactory
	{
		return new PhpParser\BuilderFactory;
	}


	public function createService02(): PHPStan\Parser\LexerFactory
	{
		return new PHPStan\Parser\LexerFactory($this->getService('07'));
	}


	public function createService03(): PhpParser\NodeVisitor\NameResolver
	{
		return new PhpParser\NodeVisitor\NameResolver(null, ['preserveOriginalNames' => true]);
	}


	public function createService04(): PhpParser\NodeVisitor\NodeConnectingVisitor
	{
		return new PhpParser\NodeVisitor\NodeConnectingVisitor;
	}


	public function createService05(): PhpParser\PrettyPrinter\Standard
	{
		return new PhpParser\PrettyPrinter\Standard;
	}


	public function createService06(): PHPStan\Broker\AnonymousClassNameHelper
	{
		return new PHPStan\Broker\AnonymousClassNameHelper($this->getService('044'), $this->getService('simpleRelativePathHelper'));
	}


	public function createService07(): PHPStan\Php\PhpVersion
	{
		return $this->getService('08')->create();
	}


	public function createService08(): PHPStan\Php\PhpVersionFactory
	{
		return $this->getService('09')->create();
	}


	public function createService09(): PHPStan\Php\PhpVersionFactoryFactory
	{
		return new PHPStan\Php\PhpVersionFactoryFactory(
			null,
			['/home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/..', '/home/gamecharmer/repositories/Database']
		);
	}


	public function createService010(): PHPStan\PhpDocParser\Lexer\Lexer
	{
		return new PHPStan\PhpDocParser\Lexer\Lexer;
	}


	public function createService011(): PHPStan\PhpDocParser\Parser\TypeParser
	{
		return new PHPStan\PhpDocParser\Parser\TypeParser($this->getService('012'));
	}


	public function createService012(): PHPStan\PhpDocParser\Parser\ConstExprParser
	{
		return new PHPStan\PhpDocParser\Parser\ConstExprParser;
	}


	public function createService013(): PHPStan\PhpDocParser\Parser\PhpDocParser
	{
		return new PHPStan\PhpDocParser\Parser\PhpDocParser($this->getService('011'), $this->getService('012'));
	}


	public function createService014(): PHPStan\PhpDoc\PhpDocInheritanceResolver
	{
		return new PHPStan\PhpDoc\PhpDocInheritanceResolver($this->getService('0113'), $this->getService('stubPhpDocProvider'));
	}


	public function createService015(): PHPStan\PhpDoc\PhpDocNodeResolver
	{
		return new PHPStan\PhpDoc\PhpDocNodeResolver($this->getService('018'), $this->getService('017'), $this->getService('0106'));
	}


	public function createService016(): PHPStan\PhpDoc\PhpDocStringResolver
	{
		return new PHPStan\PhpDoc\PhpDocStringResolver($this->getService('010'), $this->getService('013'));
	}


	public function createService017(): PHPStan\PhpDoc\ConstExprNodeResolver
	{
		return new PHPStan\PhpDoc\ConstExprNodeResolver;
	}


	public function createService018(): PHPStan\PhpDoc\TypeNodeResolver
	{
		return new PHPStan\PhpDoc\TypeNodeResolver($this->getService('019'), $this->getService('071'), $this->getService('0115'));
	}


	public function createService019(): PHPStan\PhpDoc\TypeNodeResolverExtensionRegistryProvider
	{
		return new PHPStan\PhpDoc\LazyTypeNodeResolverExtensionRegistryProvider($this->getService('037'));
	}


	public function createService020(): PHPStan\PhpDoc\TypeStringResolver
	{
		return new PHPStan\PhpDoc\TypeStringResolver($this->getService('010'), $this->getService('011'), $this->getService('018'));
	}


	public function createService021(): PHPStan\PhpDoc\StubValidator
	{
		return new PHPStan\PhpDoc\StubValidator($this->getService('039'));
	}


	public function createService022(): PHPStan\Analyser\Analyser
	{
		return new PHPStan\Analyser\Analyser($this->getService('023'), $this->getService('registry'), $this->getService('026'), 50);
	}


	public function createService023(): PHPStan\Analyser\FileAnalyser
	{
		return new PHPStan\Analyser\FileAnalyser(
			$this->getService('025'),
			$this->getService('026'),
			$this->getService('defaultAnalysisParser'),
			$this->getService('033'),
			true
		);
	}


	public function createService024(): PHPStan\Analyser\IgnoredErrorHelper
	{
		return new PHPStan\Analyser\IgnoredErrorHelper($this->getService('044'), [], true);
	}


	public function createService025(): PHPStan\Analyser\LazyScopeFactory
	{
		return new PHPStan\Analyser\LazyScopeFactory('PHPStan\Analyser\MutatingScope', $this->getService('037'));
	}


	public function createService026(): PHPStan\Analyser\NodeScopeResolver
	{
		return new PHPStan\Analyser\NodeScopeResolver(
			$this->getService('reflectionProvider'),
			$this->getService('nodeScopeResolverReflector'),
			$this->getService('040'),
			$this->getService('defaultAnalysisParser'),
			$this->getService('0113'),
			$this->getService('stubPhpDocProvider'),
			$this->getService('07'),
			$this->getService('014'),
			$this->getService('044'),
			$this->getService('typeSpecifier'),
			$this->getService('043'),
			true,
			true,
			[],
			[],
			true
		);
	}


	public function createService027(): PHPStan\Analyser\ResultCache\ResultCacheManagerFactory
	{
		return new class ($this) implements PHPStan\Analyser\ResultCache\ResultCacheManagerFactory {
			private $container;


			public function __construct(Container_170e70cc38 $container)
			{
				$this->container = $container;
			}


			public function create(array $fileReplacements): PHPStan\Analyser\ResultCache\ResultCacheManager
			{
				return new PHPStan\Analyser\ResultCache\ResultCacheManager(
					$this->container->getService('034'),
					$this->container->getService('fileFinderScan'),
					$this->container->getService('reflectionProvider'),
					'/home/gamecharmer/repositories/Database/stantmp/resultCache.php',
					'/home/gamecharmer/repositories/Database/stantmp/resultCaches',
					$this->container->parameters['analysedPaths'],
					['/home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/..', '/home/gamecharmer/repositories/Database'],
					[
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionAttribute.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionClass.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionClassConstant.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionFunctionAbstract.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionParameter.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionProperty.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/iterable.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ArrayObject.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/WeakReference.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ext-ds.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/PDOStatement.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/date.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/mysqli.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/zip.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/dom.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/spl.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/SplObjectStorage.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/Exception.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/arrayFunctions.stub',
					],
					'0',
					null,
					[
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionUnionType.php',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionAttribute.php',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/Attribute.php',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/runtime/ReflectionIntersectionType.php',
					],
					[],
					[],
					$fileReplacements,
					false
				);
			}
		};
	}


	public function createService028(): PHPStan\Analyser\ResultCache\ResultCacheClearer
	{
		return new PHPStan\Analyser\ResultCache\ResultCacheClearer(
			'/home/gamecharmer/repositories/Database/stantmp/resultCache.php',
			'/home/gamecharmer/repositories/Database/stantmp/resultCaches'
		);
	}


	public function createService029(): PHPStan\Cache\Cache
	{
		return new PHPStan\Cache\Cache($this->getService('cacheStorage'));
	}


	public function createService030(): PHPStan\Command\AnalyseApplication
	{
		return new PHPStan\Command\AnalyseApplication(
			$this->getService('031'),
			$this->getService('021'),
			$this->getService('027'),
			$this->getService('024'),
			50
		);
	}


	public function createService031(): PHPStan\Command\AnalyserRunner
	{
		return new PHPStan\Command\AnalyserRunner(
			$this->getService('050'),
			$this->getService('022'),
			$this->getService('049'),
			$this->getService('052')
		);
	}


	public function createService032(): PHPStan\Command\FixerApplication
	{
		return new PHPStan\Command\FixerApplication(
			$this->getService('047'),
			$this->getService('027'),
			$this->getService('028'),
			$this->getService('024'),
			$this->getService('052'),
			$this->getService('050'),
			$this->parameters['analysedPaths'],
			'/home/gamecharmer/repositories/Database',
			'/tmp/phpstan-fixer',
			1
		);
	}


	public function createService033(): PHPStan\Dependency\DependencyResolver
	{
		return new PHPStan\Dependency\DependencyResolver(
			$this->getService('044'),
			$this->getService('reflectionProvider'),
			$this->getService('035')
		);
	}


	public function createService034(): PHPStan\Dependency\ExportedNodeFetcher
	{
		return new PHPStan\Dependency\ExportedNodeFetcher($this->getService('defaultAnalysisParser'), $this->getService('036'));
	}


	public function createService035(): PHPStan\Dependency\ExportedNodeResolver
	{
		return new PHPStan\Dependency\ExportedNodeResolver($this->getService('0113'), $this->getService('05'));
	}


	public function createService036(): PHPStan\Dependency\ExportedNodeVisitor
	{
		return new PHPStan\Dependency\ExportedNodeVisitor($this->getService('035'));
	}


	public function createService037(): PHPStan\DependencyInjection\Container
	{
		return new PHPStan\DependencyInjection\MemoizingContainer($this->getService('038'));
	}


	public function createService038(): PHPStan\DependencyInjection\Nette\NetteContainer
	{
		return new PHPStan\DependencyInjection\Nette\NetteContainer($this);
	}


	public function createService039(): PHPStan\DependencyInjection\DerivativeContainerFactory
	{
		return new PHPStan\DependencyInjection\DerivativeContainerFactory(
			'/home/gamecharmer/repositories/Database',
			'/home/gamecharmer/repositories/Database/stantmp',
			['/home/gamecharmer/repositories/Database/phpstan.neon'],
			$this->parameters['analysedPaths'],
			['/home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/..', '/home/gamecharmer/repositories/Database'],
			$this->parameters['analysedPathsFromConfig'],
			'0',
			null,
			null,
			$this->parameters['singleReflectionFile'],
			$this->parameters['singleReflectionInsteadOfFile']
		);
	}


	public function createService040(): PHPStan\DependencyInjection\Reflection\ClassReflectionExtensionRegistryProvider
	{
		return new PHPStan\DependencyInjection\Reflection\LazyClassReflectionExtensionRegistryProvider($this->getService('037'));
	}


	public function createService041(): PHPStan\DependencyInjection\Type\DynamicReturnTypeExtensionRegistryProvider
	{
		return new PHPStan\DependencyInjection\Type\LazyDynamicReturnTypeExtensionRegistryProvider($this->getService('037'));
	}


	public function createService042(): PHPStan\DependencyInjection\Type\OperatorTypeSpecifyingExtensionRegistryProvider
	{
		return new PHPStan\DependencyInjection\Type\LazyOperatorTypeSpecifyingExtensionRegistryProvider($this->getService('037'));
	}


	public function createService043(): PHPStan\DependencyInjection\Type\DynamicThrowTypeExtensionProvider
	{
		return new PHPStan\DependencyInjection\Type\LazyDynamicThrowTypeExtensionProvider($this->getService('037'));
	}


	public function createService044(): PHPStan\File\FileHelper
	{
		return new PHPStan\File\FileHelper('/home/gamecharmer/repositories/Database');
	}


	public function createService045(): PHPStan\File\FileExcluderFactory
	{
		return new PHPStan\File\FileExcluderFactory(
			$this->getService('046'),
			[],
			[
				'analyseAndScan' => ['/home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/../../../src/Generated/*'],
				'analyse' => [],
			]
		);
	}


	public function createService046(): PHPStan\File\FileExcluderRawFactory
	{
		return new class ($this) implements PHPStan\File\FileExcluderRawFactory {
			private $container;


			public function __construct(Container_170e70cc38 $container)
			{
				$this->container = $container;
			}


			public function create(array $analyseExcludes): PHPStan\File\FileExcluder
			{
				return new PHPStan\File\FileExcluder(
					$this->container->getService('044'),
					$analyseExcludes,
					[
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionAttribute.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionClass.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionClassConstant.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionFunctionAbstract.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionParameter.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionProperty.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/iterable.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ArrayObject.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/WeakReference.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ext-ds.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/PDOStatement.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/date.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/mysqli.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/zip.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/dom.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/spl.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/SplObjectStorage.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/Exception.stub',
						'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/arrayFunctions.stub',
					]
				);
			}
		};
	}


	public function createService047(): PHPStan\File\FileMonitor
	{
		return new PHPStan\File\FileMonitor($this->getService('fileFinderAnalyse'));
	}


	public function createService048(): PHPStan\NodeVisitor\StatementOrderVisitor
	{
		return new PHPStan\NodeVisitor\StatementOrderVisitor;
	}


	public function createService049(): PHPStan\Parallel\ParallelAnalyser
	{
		return new PHPStan\Parallel\ParallelAnalyser(50, 3000.0, 134217728);
	}


	public function createService050(): PHPStan\Parallel\Scheduler
	{
		return new PHPStan\Parallel\Scheduler(20, 1, 2);
	}


	public function createService051(): PHPStan\Parser\FunctionCallStatementFinder
	{
		return new PHPStan\Parser\FunctionCallStatementFinder;
	}


	public function createService052(): PHPStan\Process\CpuCoreCounter
	{
		return new PHPStan\Process\CpuCoreCounter;
	}


	public function createService053(): PHPStan\Reflection\FunctionReflectionFactory
	{
		return new class ($this) implements PHPStan\Reflection\FunctionReflectionFactory {
			private $container;


			public function __construct(Container_170e70cc38 $container)
			{
				$this->container = $container;
			}


			public function create(
				ReflectionFunction $reflection,
				PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap,
				array $phpDocParameterTypes,
				?PHPStan\Type\Type $phpDocReturnType,
				?PHPStan\Type\Type $phpDocThrowType,
				?string $deprecatedDescription,
				bool $isDeprecated,
				bool $isInternal,
				bool $isFinal,
				?string $filename,
				?bool $isPure = null
			): PHPStan\Reflection\Php\PhpFunctionReflection {
				return new PHPStan\Reflection\Php\PhpFunctionReflection(
					$reflection,
					$this->container->getService('defaultAnalysisParser'),
					$this->container->getService('051'),
					$this->container->getService('029'),
					$templateTypeMap,
					$phpDocParameterTypes,
					$phpDocReturnType,
					$phpDocThrowType,
					$deprecatedDescription,
					$isDeprecated,
					$isInternal,
					$isFinal,
					$filename,
					$isPure
				);
			}
		};
	}


	public function createService054(): PHPStan\Reflection\Annotations\AnnotationsMethodsClassReflectionExtension
	{
		return new PHPStan\Reflection\Annotations\AnnotationsMethodsClassReflectionExtension;
	}


	public function createService055(): PHPStan\Reflection\Annotations\AnnotationsPropertiesClassReflectionExtension
	{
		return new PHPStan\Reflection\Annotations\AnnotationsPropertiesClassReflectionExtension;
	}


	public function createService056(): PHPStan\Reflection\BetterReflection\SourceLocator\CachingVisitor
	{
		return new PHPStan\Reflection\BetterReflection\SourceLocator\CachingVisitor;
	}


	public function createService057(): PHPStan\Reflection\BetterReflection\SourceLocator\FileNodesFetcher
	{
		return new PHPStan\Reflection\BetterReflection\SourceLocator\FileNodesFetcher(
			$this->getService('056'),
			$this->getService('defaultAnalysisParser')
		);
	}


	public function createService058(): PHPStan\Reflection\BetterReflection\SourceLocator\AutoloadSourceLocator
	{
		return new PHPStan\Reflection\BetterReflection\SourceLocator\AutoloadSourceLocator($this->getService('057'), false);
	}


	public function createService059(): PHPStan\Reflection\BetterReflection\SourceLocator\ComposerJsonAndInstalledJsonSourceLocatorMaker
	{
		return new PHPStan\Reflection\BetterReflection\SourceLocator\ComposerJsonAndInstalledJsonSourceLocatorMaker(
			$this->getService('061'),
			$this->getService('062'),
			$this->getService('060')
		);
	}


	public function createService060(): PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorFactory
	{
		return new PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorFactory(
			$this->getService('057'),
			$this->getService('fileFinderScan'),
			$this->getService('07')
		);
	}


	public function createService061(): PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorRepository
	{
		return new PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedDirectorySourceLocatorRepository($this->getService('060'));
	}


	public function createService062(): PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedPsrAutoloaderLocatorFactory
	{
		return new class ($this) implements PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedPsrAutoloaderLocatorFactory {
			private $container;


			public function __construct(Container_170e70cc38 $container)
			{
				$this->container = $container;
			}


			public function create(PHPStan\BetterReflection\SourceLocator\Type\Composer\Psr\PsrAutoloaderMapping $mapping): PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedPsrAutoloaderLocator
			{
				return new PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedPsrAutoloaderLocator($mapping, $this->container->getService('064'));
			}
		};
	}


	public function createService063(): PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorFactory
	{
		return new class ($this) implements PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorFactory {
			private $container;


			public function __construct(Container_170e70cc38 $container)
			{
				$this->container = $container;
			}


			public function create(string $fileName): PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocator
			{
				return new PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocator(
					$this->container->getService('057'),
					$fileName
				);
			}
		};
	}


	public function createService064(): PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorRepository
	{
		return new PHPStan\Reflection\BetterReflection\SourceLocator\OptimizedSingleFileSourceLocatorRepository($this->getService('063'));
	}


	public function createService065(): PHPStan\Reflection\Mixin\MixinMethodsClassReflectionExtension
	{
		return new PHPStan\Reflection\Mixin\MixinMethodsClassReflectionExtension([]);
	}


	public function createService066(): PHPStan\Reflection\Mixin\MixinPropertiesClassReflectionExtension
	{
		return new PHPStan\Reflection\Mixin\MixinPropertiesClassReflectionExtension([]);
	}


	public function createService067(): PHPStan\Reflection\Php\PhpClassReflectionExtension
	{
		return new PHPStan\Reflection\Php\PhpClassReflectionExtension(
			$this->getService('025'),
			$this->getService('026'),
			$this->getService('068'),
			$this->getService('014'),
			$this->getService('054'),
			$this->getService('055'),
			$this->getService('077'),
			$this->getService('defaultAnalysisParser'),
			$this->getService('stubPhpDocProvider'),
			$this->getService('071'),
			$this->getService('0113'),
			false,
			['stdClass']
		);
	}


	public function createService068(): PHPStan\Reflection\Php\PhpMethodReflectionFactory
	{
		return new class ($this) implements PHPStan\Reflection\Php\PhpMethodReflectionFactory {
			private $container;


			public function __construct(Container_170e70cc38 $container)
			{
				$this->container = $container;
			}


			public function create(
				PHPStan\Reflection\ClassReflection $declaringClass,
				?PHPStan\Reflection\ClassReflection $declaringTrait,
				PHPStan\Reflection\Php\BuiltinMethodReflection $reflection,
				PHPStan\Type\Generic\TemplateTypeMap $templateTypeMap,
				array $phpDocParameterTypes,
				?PHPStan\Type\Type $phpDocReturnType,
				?PHPStan\Type\Type $phpDocThrowType,
				?string $deprecatedDescription,
				bool $isDeprecated,
				bool $isInternal,
				bool $isFinal,
				?bool $isPure = null
			): PHPStan\Reflection\Php\PhpMethodReflection {
				return new PHPStan\Reflection\Php\PhpMethodReflection(
					$declaringClass,
					$declaringTrait,
					$reflection,
					$this->container->getService('reflectionProvider'),
					$this->container->getService('defaultAnalysisParser'),
					$this->container->getService('051'),
					$this->container->getService('029'),
					$templateTypeMap,
					$phpDocParameterTypes,
					$phpDocReturnType,
					$phpDocThrowType,
					$deprecatedDescription,
					$isDeprecated,
					$isInternal,
					$isFinal,
					$isPure
				);
			}
		};
	}


	public function createService069(): PHPStan\Reflection\Php\Soap\SoapClientMethodsClassReflectionExtension
	{
		return new PHPStan\Reflection\Php\Soap\SoapClientMethodsClassReflectionExtension;
	}


	public function createService070(): PHPStan\Reflection\Php\UniversalObjectCratesClassReflectionExtension
	{
		return new PHPStan\Reflection\Php\UniversalObjectCratesClassReflectionExtension(
			$this->getService('reflectionProvider'),
			['stdClass']
		);
	}


	public function createService071(): PHPStan\Reflection\ReflectionProvider\ReflectionProviderProvider
	{
		return new PHPStan\Reflection\ReflectionProvider\LazyReflectionProviderProvider($this->getService('037'));
	}


	public function createService072(): PHPStan\Reflection\SignatureMap\NativeFunctionReflectionProvider
	{
		return new PHPStan\Reflection\SignatureMap\NativeFunctionReflectionProvider(
			$this->getService('077'),
			$this->getService('betterReflectionReflector'),
			$this->getService('0113'),
			$this->getService('stubPhpDocProvider')
		);
	}


	public function createService073(): PHPStan\Reflection\SignatureMap\SignatureMapParser
	{
		return new PHPStan\Reflection\SignatureMap\SignatureMapParser($this->getService('020'));
	}


	public function createService074(): PHPStan\Reflection\SignatureMap\FunctionSignatureMapProvider
	{
		return new PHPStan\Reflection\SignatureMap\FunctionSignatureMapProvider($this->getService('073'), $this->getService('07'));
	}


	public function createService075(): PHPStan\Reflection\SignatureMap\Php8SignatureMapProvider
	{
		return new PHPStan\Reflection\SignatureMap\Php8SignatureMapProvider(
			$this->getService('074'),
			$this->getService('057'),
			$this->getService('0113')
		);
	}


	public function createService076(): PHPStan\Reflection\SignatureMap\SignatureMapProviderFactory
	{
		return new PHPStan\Reflection\SignatureMap\SignatureMapProviderFactory(
			$this->getService('07'),
			$this->getService('074'),
			$this->getService('075')
		);
	}


	public function createService077(): PHPStan\Reflection\SignatureMap\SignatureMapProvider
	{
		return $this->getService('076')->create();
	}


	public function createService078(): PHPStan\Rules\Api\ApiRuleHelper
	{
		return new PHPStan\Rules\Api\ApiRuleHelper;
	}


	public function createService079(): PHPStan\Rules\AttributesCheck
	{
		return new PHPStan\Rules\AttributesCheck(
			$this->getService('reflectionProvider'),
			$this->getService('091'),
			$this->getService('081')
		);
	}


	public function createService080(): PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchCheck
	{
		return new PHPStan\Rules\Arrays\NonexistentOffsetInArrayDimFetchCheck($this->getService('0111'), false);
	}


	public function createService081(): PHPStan\Rules\ClassCaseSensitivityCheck
	{
		return new PHPStan\Rules\ClassCaseSensitivityCheck($this->getService('reflectionProvider'), false);
	}


	public function createService082(): PHPStan\Rules\Comparison\ConstantConditionRuleHelper
	{
		return new PHPStan\Rules\Comparison\ConstantConditionRuleHelper($this->getService('083'), true);
	}


	public function createService083(): PHPStan\Rules\Comparison\ImpossibleCheckTypeHelper
	{
		return new PHPStan\Rules\Comparison\ImpossibleCheckTypeHelper(
			$this->getService('reflectionProvider'),
			$this->getService('typeSpecifier'),
			['stdClass'],
			true
		);
	}


	public function createService084(): PHPStan\Rules\Exceptions\DefaultExceptionTypeResolver
	{
		return new PHPStan\Rules\Exceptions\DefaultExceptionTypeResolver($this->getService('reflectionProvider'), [], [], [], []);
	}


	public function createService085(): PHPStan\Rules\Exceptions\MissingCheckedExceptionInFunctionThrowsRule
	{
		return new PHPStan\Rules\Exceptions\MissingCheckedExceptionInFunctionThrowsRule($this->getService('087'));
	}


	public function createService086(): PHPStan\Rules\Exceptions\MissingCheckedExceptionInMethodThrowsRule
	{
		return new PHPStan\Rules\Exceptions\MissingCheckedExceptionInMethodThrowsRule($this->getService('087'));
	}


	public function createService087(): PHPStan\Rules\Exceptions\MissingCheckedExceptionInThrowsCheck
	{
		return new PHPStan\Rules\Exceptions\MissingCheckedExceptionInThrowsCheck($this->getService('exceptionTypeResolver'));
	}


	public function createService088(): PHPStan\Rules\Exceptions\TooWideFunctionThrowTypeRule
	{
		return new PHPStan\Rules\Exceptions\TooWideFunctionThrowTypeRule($this->getService('090'));
	}


	public function createService089(): PHPStan\Rules\Exceptions\TooWideMethodThrowTypeRule
	{
		return new PHPStan\Rules\Exceptions\TooWideMethodThrowTypeRule($this->getService('0113'), $this->getService('090'));
	}


	public function createService090(): PHPStan\Rules\Exceptions\TooWideThrowTypeCheck
	{
		return new PHPStan\Rules\Exceptions\TooWideThrowTypeCheck;
	}


	public function createService091(): PHPStan\Rules\FunctionCallParametersCheck
	{
		return new PHPStan\Rules\FunctionCallParametersCheck(
			$this->getService('0111'),
			$this->getService('0104'),
			$this->getService('07'),
			$this->getService('0106'),
			$this->getService('0109'),
			false,
			false,
			false,
			false
		);
	}


	public function createService092(): PHPStan\Rules\FunctionDefinitionCheck
	{
		return new PHPStan\Rules\FunctionDefinitionCheck(
			$this->getService('reflectionProvider'),
			$this->getService('081'),
			$this->getService('0106'),
			$this->getService('07'),
			false,
			true
		);
	}


	public function createService093(): PHPStan\Rules\FunctionReturnTypeCheck
	{
		return new PHPStan\Rules\FunctionReturnTypeCheck($this->getService('0111'));
	}


	public function createService094(): PHPStan\Rules\Generics\CrossCheckInterfacesHelper
	{
		return new PHPStan\Rules\Generics\CrossCheckInterfacesHelper;
	}


	public function createService095(): PHPStan\Rules\Generics\GenericAncestorsCheck
	{
		return new PHPStan\Rules\Generics\GenericAncestorsCheck(
			$this->getService('reflectionProvider'),
			$this->getService('096'),
			$this->getService('098'),
			false,
			['DatePeriod', 'CallbackFilterIterator', 'FilterIterator', 'RecursiveCallbackFilterIterator']
		);
	}


	public function createService096(): PHPStan\Rules\Generics\GenericObjectTypeCheck
	{
		return new PHPStan\Rules\Generics\GenericObjectTypeCheck;
	}


	public function createService097(): PHPStan\Rules\Generics\TemplateTypeCheck
	{
		return new PHPStan\Rules\Generics\TemplateTypeCheck(
			$this->getService('reflectionProvider'),
			$this->getService('081'),
			$this->getService('096'),
			$this->getService('0114'),
			false
		);
	}


	public function createService098(): PHPStan\Rules\Generics\VarianceCheck
	{
		return new PHPStan\Rules\Generics\VarianceCheck;
	}


	public function createService099(): PHPStan\Rules\IssetCheck
	{
		return new PHPStan\Rules\IssetCheck($this->getService('0108'), $this->getService('0109'), false, true);
	}


	public function createService0100(): PHPStan\Rules\Methods\MethodCallCheck
	{
		return new PHPStan\Rules\Methods\MethodCallCheck(
			$this->getService('reflectionProvider'),
			$this->getService('0111'),
			false,
			false
		);
	}


	public function createService0101(): PHPStan\Rules\Methods\StaticMethodCallCheck
	{
		return new PHPStan\Rules\Methods\StaticMethodCallCheck(
			$this->getService('reflectionProvider'),
			$this->getService('0111'),
			$this->getService('081'),
			false,
			false
		);
	}


	public function createService0102(): PHPStan\Rules\Methods\MethodSignatureRule
	{
		return new PHPStan\Rules\Methods\MethodSignatureRule(false, false);
	}


	public function createService0103(): PHPStan\Rules\MissingTypehintCheck
	{
		return new PHPStan\Rules\MissingTypehintCheck(
			$this->getService('reflectionProvider'),
			false,
			false,
			false,
			['DatePeriod', 'CallbackFilterIterator', 'FilterIterator', 'RecursiveCallbackFilterIterator']
		);
	}


	public function createService0104(): PHPStan\Rules\NullsafeCheck
	{
		return new PHPStan\Rules\NullsafeCheck;
	}


	public function createService0105(): PHPStan\Rules\Constants\LazyAlwaysUsedClassConstantsExtensionProvider
	{
		return new PHPStan\Rules\Constants\LazyAlwaysUsedClassConstantsExtensionProvider($this->getService('037'));
	}


	public function createService0106(): PHPStan\Rules\PhpDoc\UnresolvableTypeHelper
	{
		return new PHPStan\Rules\PhpDoc\UnresolvableTypeHelper;
	}


	public function createService0107(): PHPStan\Rules\Properties\LazyReadWritePropertiesExtensionProvider
	{
		return new PHPStan\Rules\Properties\LazyReadWritePropertiesExtensionProvider($this->getService('037'));
	}


	public function createService0108(): PHPStan\Rules\Properties\PropertyDescriptor
	{
		return new PHPStan\Rules\Properties\PropertyDescriptor;
	}


	public function createService0109(): PHPStan\Rules\Properties\PropertyReflectionFinder
	{
		return new PHPStan\Rules\Properties\PropertyReflectionFinder;
	}


	public function createService0110(): PHPStan\Rules\RegistryFactory
	{
		return new PHPStan\Rules\RegistryFactory($this->getService('037'));
	}


	public function createService0111(): PHPStan\Rules\RuleLevelHelper
	{
		return new PHPStan\Rules\RuleLevelHelper($this->getService('reflectionProvider'), false, true, false, false);
	}


	public function createService0112(): PHPStan\Rules\UnusedFunctionParametersCheck
	{
		return new PHPStan\Rules\UnusedFunctionParametersCheck($this->getService('reflectionProvider'));
	}


	public function createService0113(): PHPStan\Type\FileTypeMapper
	{
		return new PHPStan\Type\FileTypeMapper(
			$this->getService('071'),
			$this->getService('defaultAnalysisParser'),
			$this->getService('016'),
			$this->getService('015'),
			$this->getService('029'),
			$this->getService('06'),
			$this->getService('07'),
			$this->getService('044')
		);
	}


	public function createService0114(): PHPStan\Type\TypeAliasResolver
	{
		return new PHPStan\Type\UsefulTypeAliasResolver(
			[],
			$this->getService('020'),
			$this->getService('018'),
			$this->getService('reflectionProvider')
		);
	}


	public function createService0115(): PHPStan\Type\TypeAliasResolverProvider
	{
		return new PHPStan\Type\LazyTypeAliasResolverProvider($this->getService('037'));
	}


	public function createService0116(): PHPStan\Type\Php\ArgumentBasedFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArgumentBasedFunctionReturnTypeExtension;
	}


	public function createService0117(): PHPStan\Type\Php\ArrayColumnFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayColumnFunctionReturnTypeExtension($this->getService('07'));
	}


	public function createService0118(): PHPStan\Type\Php\ArrayCombineFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayCombineFunctionReturnTypeExtension($this->getService('07'));
	}


	public function createService0119(): PHPStan\Type\Php\ArrayCurrentDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayCurrentDynamicReturnTypeExtension;
	}


	public function createService0120(): PHPStan\Type\Php\ArrayFillFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayFillFunctionReturnTypeExtension($this->getService('07'));
	}


	public function createService0121(): PHPStan\Type\Php\ArrayFillKeysFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayFillKeysFunctionReturnTypeExtension;
	}


	public function createService0122(): PHPStan\Type\Php\ArrayFilterFunctionReturnTypeReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayFilterFunctionReturnTypeReturnTypeExtension;
	}


	public function createService0123(): PHPStan\Type\Php\ArrayFlipFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayFlipFunctionReturnTypeExtension;
	}


	public function createService0124(): PHPStan\Type\Php\ArrayKeyDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayKeyDynamicReturnTypeExtension;
	}


	public function createService0125(): PHPStan\Type\Php\ArrayKeyExistsFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\ArrayKeyExistsFunctionTypeSpecifyingExtension;
	}


	public function createService0126(): PHPStan\Type\Php\ArrayKeyFirstDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayKeyFirstDynamicReturnTypeExtension;
	}


	public function createService0127(): PHPStan\Type\Php\ArrayKeyLastDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayKeyLastDynamicReturnTypeExtension;
	}


	public function createService0128(): PHPStan\Type\Php\ArrayKeysFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayKeysFunctionDynamicReturnTypeExtension;
	}


	public function createService0129(): PHPStan\Type\Php\ArrayMapFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayMapFunctionReturnTypeExtension;
	}


	public function createService0130(): PHPStan\Type\Php\ArrayMergeFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayMergeFunctionDynamicReturnTypeExtension;
	}


	public function createService0131(): PHPStan\Type\Php\ArrayNextDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayNextDynamicReturnTypeExtension;
	}


	public function createService0132(): PHPStan\Type\Php\ArrayPopFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayPopFunctionReturnTypeExtension;
	}


	public function createService0133(): PHPStan\Type\Php\ArrayRandFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayRandFunctionReturnTypeExtension;
	}


	public function createService0134(): PHPStan\Type\Php\ArrayReduceFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayReduceFunctionReturnTypeExtension;
	}


	public function createService0135(): PHPStan\Type\Php\ArrayReverseFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayReverseFunctionReturnTypeExtension;
	}


	public function createService0136(): PHPStan\Type\Php\ArrayShiftFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayShiftFunctionReturnTypeExtension;
	}


	public function createService0137(): PHPStan\Type\Php\ArraySliceFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArraySliceFunctionReturnTypeExtension;
	}


	public function createService0138(): PHPStan\Type\Php\ArraySpliceFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArraySpliceFunctionReturnTypeExtension;
	}


	public function createService0139(): PHPStan\Type\Php\ArraySearchFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArraySearchFunctionDynamicReturnTypeExtension;
	}


	public function createService0140(): PHPStan\Type\Php\ArrayValuesFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayValuesFunctionDynamicReturnTypeExtension;
	}


	public function createService0141(): PHPStan\Type\Php\ArraySumFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArraySumFunctionDynamicReturnTypeExtension;
	}


	public function createService0142(): PHPStan\Type\Php\Base64DecodeDynamicFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\Base64DecodeDynamicFunctionReturnTypeExtension;
	}


	public function createService0143(): PHPStan\Type\Php\BcMathStringOrNullReturnTypeExtension
	{
		return new PHPStan\Type\Php\BcMathStringOrNullReturnTypeExtension;
	}


	public function createService0144(): PHPStan\Type\Php\ClosureBindDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ClosureBindDynamicReturnTypeExtension;
	}


	public function createService0145(): PHPStan\Type\Php\ClosureBindToDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ClosureBindToDynamicReturnTypeExtension;
	}


	public function createService0146(): PHPStan\Type\Php\ClosureFromCallableDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ClosureFromCallableDynamicReturnTypeExtension;
	}


	public function createService0147(): PHPStan\Type\Php\CompactFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\CompactFunctionReturnTypeExtension(false);
	}


	public function createService0148(): PHPStan\Type\Php\CountFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\CountFunctionReturnTypeExtension;
	}


	public function createService0149(): PHPStan\Type\Php\CountFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\CountFunctionTypeSpecifyingExtension;
	}


	public function createService0150(): PHPStan\Type\Php\CurlInitReturnTypeExtension
	{
		return new PHPStan\Type\Php\CurlInitReturnTypeExtension;
	}


	public function createService0151(): PHPStan\Type\Php\DateFormatFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\DateFormatFunctionReturnTypeExtension;
	}


	public function createService0152(): PHPStan\Type\Php\DateFormatMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\DateFormatMethodReturnTypeExtension;
	}


	public function createService0153(): PHPStan\Type\Php\DateFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\DateFunctionReturnTypeExtension;
	}


	public function createService0154(): PHPStan\Type\Php\DateIntervalConstructorThrowTypeExtension
	{
		return new PHPStan\Type\Php\DateIntervalConstructorThrowTypeExtension;
	}


	public function createService0155(): PHPStan\Type\Php\DateTimeDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\DateTimeDynamicReturnTypeExtension;
	}


	public function createService0156(): PHPStan\Type\Php\DateTimeConstructorThrowTypeExtension
	{
		return new PHPStan\Type\Php\DateTimeConstructorThrowTypeExtension;
	}


	public function createService0157(): PHPStan\Type\Php\DsMapDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\DsMapDynamicReturnTypeExtension;
	}


	public function createService0158(): PHPStan\Type\Php\DioStatDynamicFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\DioStatDynamicFunctionReturnTypeExtension;
	}


	public function createService0159(): PHPStan\Type\Php\ExplodeFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ExplodeFunctionDynamicReturnTypeExtension($this->getService('07'));
	}


	public function createService0160(): PHPStan\Type\Php\FilterVarDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\FilterVarDynamicReturnTypeExtension($this->getService('reflectionProvider'));
	}


	public function createService0161(): PHPStan\Type\Php\GetCalledClassDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\GetCalledClassDynamicReturnTypeExtension;
	}


	public function createService0162(): PHPStan\Type\Php\GetClassDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\GetClassDynamicReturnTypeExtension;
	}


	public function createService0163(): PHPStan\Type\Php\GetParentClassDynamicFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\GetParentClassDynamicFunctionReturnTypeExtension($this->getService('reflectionProvider'));
	}


	public function createService0164(): PHPStan\Type\Php\GettimeofdayDynamicFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\GettimeofdayDynamicFunctionReturnTypeExtension;
	}


	public function createService0165(): PHPStan\Type\Php\HashFunctionsReturnTypeExtension
	{
		return new PHPStan\Type\Php\HashFunctionsReturnTypeExtension($this->getService('07'));
	}


	public function createService0166(): PHPStan\Type\Php\IntdivThrowTypeExtension
	{
		return new PHPStan\Type\Php\IntdivThrowTypeExtension;
	}


	public function createService0167(): PHPStan\Type\Php\JsonThrowTypeExtension
	{
		return new PHPStan\Type\Php\JsonThrowTypeExtension($this->getService('reflectionProvider'));
	}


	public function createService0168(): PHPStan\Type\Php\ReflectionClassConstructorThrowTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionClassConstructorThrowTypeExtension($this->getService('reflectionProvider'));
	}


	public function createService0169(): PHPStan\Type\Php\ReflectionFunctionConstructorThrowTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionFunctionConstructorThrowTypeExtension($this->getService('reflectionProvider'));
	}


	public function createService0170(): PHPStan\Type\Php\ReflectionMethodConstructorThrowTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionMethodConstructorThrowTypeExtension($this->getService('reflectionProvider'));
	}


	public function createService0171(): PHPStan\Type\Php\ReflectionPropertyConstructorThrowTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionPropertyConstructorThrowTypeExtension($this->getService('reflectionProvider'));
	}


	public function createService0172(): PHPStan\Type\Php\SimpleXMLElementClassPropertyReflectionExtension
	{
		return new PHPStan\Type\Php\SimpleXMLElementClassPropertyReflectionExtension;
	}


	public function createService0173(): PHPStan\Type\Php\SimpleXMLElementConstructorThrowTypeExtension
	{
		return new PHPStan\Type\Php\SimpleXMLElementConstructorThrowTypeExtension;
	}


	public function createService0174(): PHPStan\Type\Php\StatDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\StatDynamicReturnTypeExtension;
	}


	public function createService0175(): PHPStan\Type\Php\MethodExistsTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\MethodExistsTypeSpecifyingExtension;
	}


	public function createService0176(): PHPStan\Type\Php\PropertyExistsTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\PropertyExistsTypeSpecifyingExtension($this->getService('0109'));
	}


	public function createService0177(): PHPStan\Type\Php\MinMaxFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\MinMaxFunctionReturnTypeExtension;
	}


	public function createService0178(): PHPStan\Type\Php\NumberFormatFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\NumberFormatFunctionDynamicReturnTypeExtension;
	}


	public function createService0179(): PHPStan\Type\Php\PathinfoFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\PathinfoFunctionDynamicReturnTypeExtension;
	}


	public function createService0180(): PHPStan\Type\Php\PregFilterFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\PregFilterFunctionReturnTypeExtension;
	}


	public function createService0181(): PHPStan\Type\Php\PregSplitDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\PregSplitDynamicReturnTypeExtension($this->getService('reflectionProvider'));
	}


	public function createService0182(): PHPStan\Type\Php\ReflectionClassIsSubclassOfTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\ReflectionClassIsSubclassOfTypeSpecifyingExtension;
	}


	public function createService0183(): PHPStan\Type\Php\ReplaceFunctionsDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ReplaceFunctionsDynamicReturnTypeExtension;
	}


	public function createService0184(): PHPStan\Type\Php\ArrayPointerFunctionsDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ArrayPointerFunctionsDynamicReturnTypeExtension;
	}


	public function createService0185(): PHPStan\Type\Php\VarExportFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\VarExportFunctionDynamicReturnTypeExtension;
	}


	public function createService0186(): PHPStan\Type\Php\MbFunctionsReturnTypeExtension
	{
		return new PHPStan\Type\Php\MbFunctionsReturnTypeExtension($this->getService('07'));
	}


	public function createService0187(): PHPStan\Type\Php\MbConvertEncodingFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\MbConvertEncodingFunctionReturnTypeExtension;
	}


	public function createService0188(): PHPStan\Type\Php\MbSubstituteCharacterDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\MbSubstituteCharacterDynamicReturnTypeExtension($this->getService('07'));
	}


	public function createService0189(): PHPStan\Type\Php\MicrotimeFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\MicrotimeFunctionReturnTypeExtension;
	}


	public function createService0190(): PHPStan\Type\Php\HrtimeFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\HrtimeFunctionReturnTypeExtension;
	}


	public function createService0191(): PHPStan\Type\Php\ImplodeFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\ImplodeFunctionReturnTypeExtension;
	}


	public function createService0192(): PHPStan\Type\Php\NonEmptyStringFunctionsReturnTypeExtension
	{
		return new PHPStan\Type\Php\NonEmptyStringFunctionsReturnTypeExtension;
	}


	public function createService0193(): PHPStan\Type\Php\StrlenFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrlenFunctionReturnTypeExtension;
	}


	public function createService0194(): PHPStan\Type\Php\StrPadFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrPadFunctionReturnTypeExtension;
	}


	public function createService0195(): PHPStan\Type\Php\StrRepeatFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrRepeatFunctionReturnTypeExtension;
	}


	public function createService0196(): PHPStan\Type\Php\SubstrDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\SubstrDynamicReturnTypeExtension;
	}


	public function createService0197(): PHPStan\Type\Php\ThrowableReturnTypeExtension
	{
		return new PHPStan\Type\Php\ThrowableReturnTypeExtension;
	}


	public function createService0198(): PHPStan\Type\Php\ParseUrlFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\ParseUrlFunctionDynamicReturnTypeExtension;
	}


	public function createService0199(): PHPStan\Type\Php\TriggerErrorDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\TriggerErrorDynamicReturnTypeExtension;
	}


	public function createService0200(): PHPStan\Type\Php\VersionCompareFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\VersionCompareFunctionDynamicReturnTypeExtension;
	}


	public function createService0201(): PHPStan\Type\Php\PowFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\PowFunctionReturnTypeExtension;
	}


	public function createService0202(): PHPStan\Type\Php\RoundFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\RoundFunctionReturnTypeExtension($this->getService('07'));
	}


	public function createService0203(): PHPStan\Type\Php\StrtotimeFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrtotimeFunctionReturnTypeExtension;
	}


	public function createService0204(): PHPStan\Type\Php\RandomIntFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\RandomIntFunctionReturnTypeExtension;
	}


	public function createService0205(): PHPStan\Type\Php\RangeFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\RangeFunctionReturnTypeExtension;
	}


	public function createService0206(): PHPStan\Type\Php\AssertFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\AssertFunctionTypeSpecifyingExtension;
	}


	public function createService0207(): PHPStan\Type\Php\ClassExistsFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\ClassExistsFunctionTypeSpecifyingExtension;
	}


	public function createService0208(): PHPStan\Type\Php\DefineConstantTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\DefineConstantTypeSpecifyingExtension;
	}


	public function createService0209(): PHPStan\Type\Php\DefinedConstantTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\DefinedConstantTypeSpecifyingExtension;
	}


	public function createService0210(): PHPStan\Type\Php\FunctionExistsFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\FunctionExistsFunctionTypeSpecifyingExtension;
	}


	public function createService0211(): PHPStan\Type\Php\InArrayFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\InArrayFunctionTypeSpecifyingExtension;
	}


	public function createService0212(): PHPStan\Type\Php\IsIntFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsIntFunctionTypeSpecifyingExtension;
	}


	public function createService0213(): PHPStan\Type\Php\IsFloatFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsFloatFunctionTypeSpecifyingExtension;
	}


	public function createService0214(): PHPStan\Type\Php\IsNullFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsNullFunctionTypeSpecifyingExtension;
	}


	public function createService0215(): PHPStan\Type\Php\IsArrayFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsArrayFunctionTypeSpecifyingExtension;
	}


	public function createService0216(): PHPStan\Type\Php\IsBoolFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsBoolFunctionTypeSpecifyingExtension;
	}


	public function createService0217(): PHPStan\Type\Php\IsCallableFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsCallableFunctionTypeSpecifyingExtension($this->getService('0175'));
	}


	public function createService0218(): PHPStan\Type\Php\IsCountableFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsCountableFunctionTypeSpecifyingExtension;
	}


	public function createService0219(): PHPStan\Type\Php\IsResourceFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsResourceFunctionTypeSpecifyingExtension;
	}


	public function createService0220(): PHPStan\Type\Php\IsIterableFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsIterableFunctionTypeSpecifyingExtension;
	}


	public function createService0221(): PHPStan\Type\Php\IsStringFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsStringFunctionTypeSpecifyingExtension;
	}


	public function createService0222(): PHPStan\Type\Php\IsSubclassOfFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsSubclassOfFunctionTypeSpecifyingExtension($this->getService('0228'));
	}


	public function createService0223(): PHPStan\Type\Php\IteratorToArrayFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\IteratorToArrayFunctionReturnTypeExtension;
	}


	public function createService0224(): PHPStan\Type\Php\IsObjectFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsObjectFunctionTypeSpecifyingExtension;
	}


	public function createService0225(): PHPStan\Type\Php\IsNumericFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsNumericFunctionTypeSpecifyingExtension;
	}


	public function createService0226(): PHPStan\Type\Php\IsScalarFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsScalarFunctionTypeSpecifyingExtension;
	}


	public function createService0227(): PHPStan\Type\Php\IsAFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\IsAFunctionTypeSpecifyingExtension($this->getService('0228'));
	}


	public function createService0228(): PHPStan\Type\Php\IsAFunctionTypeSpecifyingHelper
	{
		return new PHPStan\Type\Php\IsAFunctionTypeSpecifyingHelper;
	}


	public function createService0229(): PHPStan\Type\Php\ArrayIsListFunctionTypeSpecifyingExtension
	{
		return new PHPStan\Type\Php\ArrayIsListFunctionTypeSpecifyingExtension;
	}


	public function createService0230(): PHPStan\Type\Php\JsonThrowOnErrorDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\JsonThrowOnErrorDynamicReturnTypeExtension($this->getService('reflectionProvider'));
	}


	public function createService0231(): PHPStan\Type\Php\TypeSpecifyingFunctionsDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\TypeSpecifyingFunctionsDynamicReturnTypeExtension(
			$this->getService('reflectionProvider'),
			true,
			['stdClass']
		);
	}


	public function createService0232(): PHPStan\Type\Php\SimpleXMLElementAsXMLMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\SimpleXMLElementAsXMLMethodReturnTypeExtension;
	}


	public function createService0233(): PHPStan\Type\Php\SimpleXMLElementXpathMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\SimpleXMLElementXpathMethodReturnTypeExtension;
	}


	public function createService0234(): PHPStan\Type\Php\StrSplitFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrSplitFunctionReturnTypeExtension;
	}


	public function createService0235(): PHPStan\Type\Php\StrTokFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrTokFunctionReturnTypeExtension;
	}


	public function createService0236(): PHPStan\Type\Php\SprintfFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\SprintfFunctionDynamicReturnTypeExtension;
	}


	public function createService0237(): PHPStan\Type\Php\StrvalFamilyFunctionReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrvalFamilyFunctionReturnTypeExtension;
	}


	public function createService0238(): PHPStan\Type\Php\StrWordCountFunctionDynamicReturnTypeExtension
	{
		return new PHPStan\Type\Php\StrWordCountFunctionDynamicReturnTypeExtension;
	}


	public function createService0239(): PHPStan\Type\Php\XMLReaderOpenReturnTypeExtension
	{
		return new PHPStan\Type\Php\XMLReaderOpenReturnTypeExtension;
	}


	public function createService0240(): PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension('ReflectionClass');
	}


	public function createService0241(): PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension('ReflectionClassConstant');
	}


	public function createService0242(): PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension('ReflectionFunctionAbstract');
	}


	public function createService0243(): PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension('ReflectionParameter');
	}


	public function createService0244(): PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension
	{
		return new PHPStan\Type\Php\ReflectionGetAttributesMethodReturnTypeExtension('ReflectionProperty');
	}


	public function createService0245(): PHPStan\Type\Php\DatePeriodConstructorReturnTypeExtension
	{
		return new PHPStan\Type\Php\DatePeriodConstructorReturnTypeExtension;
	}


	public function createService0246(): PHPStan\Reflection\BetterReflection\BetterReflectionSourceLocatorFactory
	{
		return new PHPStan\Reflection\BetterReflection\BetterReflectionSourceLocatorFactory(
			$this->getService('phpParserDecorator'),
			$this->getService('php8PhpParser'),
			$this->getService('0249'),
			$this->getService('0250'),
			$this->getService('064'),
			$this->getService('061'),
			$this->getService('059'),
			$this->getService('058'),
			[],
			[],
			$this->parameters['analysedPaths'],
			['/home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/..', '/home/gamecharmer/repositories/Database'],
			$this->parameters['analysedPathsFromConfig'],
			$this->parameters['singleReflectionFile'],
			[
				'#^PhpParser\\\#i',
				'#^PHPStan\\\#i',
				'#^Hoa\\\#i',
				'#^Symfony\\\Polyfill\\\Php80\\\#i',
				'#^Symfony\\\Polyfill\\\Mbstring\\\#i',
				'#^Symfony\\\Polyfill\\\Intl\\\Normalizer\\\#i',
				'#^Symfony\\\Polyfill\\\Php73\\\#i',
				'#^Symfony\\\Polyfill\\\Php74\\\#i',
				'#^Symfony\\\Polyfill\\\Php72\\\#i',
				'#^Symfony\\\Polyfill\\\Intl\\\Grapheme\\\#i',
				'#^Composer\\\#i',
				'#^ReflectionUnionType$#i',
				'#^Attribute$#i',
				'#^ReturnTypeWillChange$#i',
				'#^ReflectionIntersectionType$#i',
				'#^UnitEnum$#i',
				'#^BackedEnum$#i',
				'#^ReflectionEnum$#i',
				'#^ReflectionEnumUnitCase$#i',
				'#^ReflectionEnumBackedCase$#i',
			]
		);
	}


	public function createService0247(): PHPStan\Reflection\BetterReflection\BetterReflectionProviderFactory
	{
		return new class ($this) implements PHPStan\Reflection\BetterReflection\BetterReflectionProviderFactory {
			private $container;


			public function __construct(Container_170e70cc38 $container)
			{
				$this->container = $container;
			}


			public function create(PHPStan\BetterReflection\Reflector\Reflector $reflector): PHPStan\Reflection\BetterReflection\BetterReflectionProvider
			{
				return new PHPStan\Reflection\BetterReflection\BetterReflectionProvider(
					$this->container->getService('071'),
					$this->container->getService('040'),
					$reflector,
					$this->container->getService('0113'),
					$this->container->getService('014'),
					$this->container->getService('07'),
					$this->container->getService('072'),
					$this->container->getService('stubPhpDocProvider'),
					$this->container->getService('053'),
					$this->container->getService('relativePathHelper'),
					$this->container->getService('06'),
					$this->container->getService('05'),
					$this->container->getService('044'),
					$this->container->getService('0249')
				);
			}
		};
	}


	public function createService0248(): PHPStan\Reflection\BetterReflection\SourceStubber\PhpStormStubsSourceStubberFactory
	{
		return new PHPStan\Reflection\BetterReflection\SourceStubber\PhpStormStubsSourceStubberFactory(
			$this->getService('php8PhpParser'),
			$this->getService('07')
		);
	}


	public function createService0249(): PHPStan\BetterReflection\SourceLocator\SourceStubber\PhpStormStubsSourceStubber
	{
		return $this->getService('0248')->create();
	}


	public function createService0250(): PHPStan\BetterReflection\SourceLocator\SourceStubber\ReflectionSourceStubber
	{
		return new PHPStan\BetterReflection\SourceLocator\SourceStubber\ReflectionSourceStubber;
	}


	public function createServiceBetterReflectionClassReflector(): PHPStan\BetterReflection\Reflector\ClassReflector
	{
		return new PHPStan\BetterReflection\Reflector\ClassReflector($this->getService('betterReflectionSourceLocator'));
	}


	public function createServiceBetterReflectionConstantReflector(): PHPStan\BetterReflection\Reflector\ConstantReflector
	{
		return new PHPStan\BetterReflection\Reflector\ConstantReflector($this->getService('betterReflectionSourceLocator'));
	}


	public function createServiceBetterReflectionFunctionReflector(): PHPStan\BetterReflection\Reflector\FunctionReflector
	{
		return new PHPStan\BetterReflection\Reflector\FunctionReflector($this->getService('betterReflectionSourceLocator'));
	}


	public function createServiceBetterReflectionProvider(): PHPStan\Reflection\BetterReflection\BetterReflectionProvider
	{
		return new PHPStan\Reflection\BetterReflection\BetterReflectionProvider(
			$this->getService('071'),
			$this->getService('040'),
			$this->getService('betterReflectionReflector'),
			$this->getService('0113'),
			$this->getService('014'),
			$this->getService('07'),
			$this->getService('072'),
			$this->getService('stubPhpDocProvider'),
			$this->getService('053'),
			$this->getService('relativePathHelper'),
			$this->getService('06'),
			$this->getService('05'),
			$this->getService('044'),
			$this->getService('0249')
		);
	}


	public function createServiceBetterReflectionReflector(): PHPStan\Reflection\BetterReflection\Reflector\MemoizingReflector
	{
		return new PHPStan\Reflection\BetterReflection\Reflector\MemoizingReflector($this->getService('originalBetterReflectionReflector'));
	}


	public function createServiceBetterReflectionSourceLocator(): PHPStan\BetterReflection\SourceLocator\Type\SourceLocator
	{
		return $this->getService('0246')->create();
	}


	public function createServiceBroker(): PHPStan\Broker\Broker
	{
		return $this->getService('brokerFactory')->create();
	}


	public function createServiceBrokerFactory(): PHPStan\Broker\BrokerFactory
	{
		return new PHPStan\Broker\BrokerFactory($this->getService('037'));
	}


	public function createServiceCacheStorage(): PHPStan\Cache\FileCacheStorage
	{
		return new PHPStan\Cache\FileCacheStorage('/home/gamecharmer/repositories/Database/stantmp/cache/PHPStan');
	}


	public function createServiceContainer(): Container_170e70cc38
	{
		return $this;
	}


	public function createServiceCurrentPhpVersionLexer(): PhpParser\Lexer
	{
		return $this->getService('02')->create();
	}


	public function createServiceCurrentPhpVersionPhpParser(): PhpParser\Parser\Php7
	{
		return new PhpParser\Parser\Php7($this->getService('currentPhpVersionLexer'));
	}


	public function createServiceCurrentPhpVersionRichParser(): PHPStan\Parser\RichParser
	{
		return new PHPStan\Parser\RichParser(
			$this->getService('currentPhpVersionPhpParser'),
			$this->getService('currentPhpVersionLexer'),
			$this->getService('03'),
			$this->getService('04'),
			$this->getService('048')
		);
	}


	public function createServiceCurrentPhpVersionSimpleDirectParser(): PHPStan\Parser\SimpleParser
	{
		return new PHPStan\Parser\SimpleParser($this->getService('currentPhpVersionPhpParser'), $this->getService('03'));
	}


	public function createServiceCurrentPhpVersionSimpleParser(): PHPStan\Parser\CleaningParser
	{
		return new PHPStan\Parser\CleaningParser($this->getService('currentPhpVersionSimpleDirectParser'), $this->getService('07'));
	}


	public function createServiceDefaultAnalysisParser(): PHPStan\Parser\CachedParser
	{
		return new PHPStan\Parser\CachedParser($this->getService('pathRoutingParser'), 1024);
	}


	public function createServiceErrorFormatter__checkstyle(): PHPStan\Command\ErrorFormatter\CheckstyleErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\CheckstyleErrorFormatter($this->getService('simpleRelativePathHelper'));
	}


	public function createServiceErrorFormatter__github(): PHPStan\Command\ErrorFormatter\GithubErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\GithubErrorFormatter(
			$this->getService('simpleRelativePathHelper'),
			$this->getService('errorFormatter.table')
		);
	}


	public function createServiceErrorFormatter__gitlab(): PHPStan\Command\ErrorFormatter\GitlabErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\GitlabErrorFormatter($this->getService('simpleRelativePathHelper'));
	}


	public function createServiceErrorFormatter__json(): PHPStan\Command\ErrorFormatter\JsonErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\JsonErrorFormatter(false);
	}


	public function createServiceErrorFormatter__junit(): PHPStan\Command\ErrorFormatter\JunitErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\JunitErrorFormatter($this->getService('simpleRelativePathHelper'));
	}


	public function createServiceErrorFormatter__prettyJson(): PHPStan\Command\ErrorFormatter\JsonErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\JsonErrorFormatter(true);
	}


	public function createServiceErrorFormatter__raw(): PHPStan\Command\ErrorFormatter\RawErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\RawErrorFormatter;
	}


	public function createServiceErrorFormatter__table(): PHPStan\Command\ErrorFormatter\TableErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\TableErrorFormatter($this->getService('relativePathHelper'), false, null);
	}


	public function createServiceErrorFormatter__teamcity(): PHPStan\Command\ErrorFormatter\TeamcityErrorFormatter
	{
		return new PHPStan\Command\ErrorFormatter\TeamcityErrorFormatter($this->getService('simpleRelativePathHelper'));
	}


	public function createServiceExceptionTypeResolver(): PHPStan\Rules\Exceptions\ExceptionTypeResolver
	{
		return $this->getService('084');
	}


	public function createServiceFileExcluderAnalyse(): PHPStan\File\FileExcluder
	{
		return $this->getService('045')->createAnalyseFileExcluder();
	}


	public function createServiceFileExcluderScan(): PHPStan\File\FileExcluder
	{
		return $this->getService('045')->createScanFileExcluder();
	}


	public function createServiceFileFinderAnalyse(): PHPStan\File\FileFinder
	{
		return new PHPStan\File\FileFinder($this->getService('fileExcluderAnalyse'), $this->getService('044'), ['php']);
	}


	public function createServiceFileFinderScan(): PHPStan\File\FileFinder
	{
		return new PHPStan\File\FileFinder($this->getService('fileExcluderScan'), $this->getService('044'), ['php']);
	}


	public function createServiceInnerRuntimeReflectionProvider(): PHPStan\Reflection\Runtime\RuntimeReflectionProvider
	{
		return new PHPStan\Reflection\Runtime\RuntimeReflectionProvider(
			$this->getService('071'),
			$this->getService('040'),
			$this->getService('053'),
			$this->getService('0113'),
			$this->getService('014'),
			$this->getService('07'),
			$this->getService('072'),
			$this->getService('stubPhpDocProvider'),
			$this->getService('0249')
		);
	}


	public function createServiceNodeScopeResolverReflector(): PHPStan\Reflection\BetterReflection\Reflector\MemoizingReflector
	{
		return $this->getService('betterReflectionReflector');
	}


	public function createServiceOriginalBetterReflectionReflector(): PHPStan\BetterReflection\Reflector\DefaultReflector
	{
		return new PHPStan\BetterReflection\Reflector\DefaultReflector($this->getService('betterReflectionSourceLocator'));
	}


	public function createServiceParentDirectoryRelativePathHelper(): PHPStan\File\ParentDirectoryRelativePathHelper
	{
		return new PHPStan\File\ParentDirectoryRelativePathHelper('/home/gamecharmer/repositories/Database');
	}


	public function createServicePathRoutingParser(): PHPStan\Parser\PathRoutingParser
	{
		return new PHPStan\Parser\PathRoutingParser(
			$this->getService('044'),
			$this->getService('currentPhpVersionRichParser'),
			$this->getService('currentPhpVersionSimpleParser'),
			$this->getService('php8Parser')
		);
	}


	public function createServicePhp8Lexer(): PhpParser\Lexer\Emulative
	{
		return new PhpParser\Lexer\Emulative;
	}


	public function createServicePhp8Parser(): PHPStan\Parser\SimpleParser
	{
		return new PHPStan\Parser\SimpleParser($this->getService('php8PhpParser'), $this->getService('03'));
	}


	public function createServicePhp8PhpParser(): PhpParser\Parser\Php7
	{
		return new PhpParser\Parser\Php7($this->getService('php8Lexer'));
	}


	public function createServicePhpParserDecorator(): PHPStan\Parser\PhpParserDecorator
	{
		return new PHPStan\Parser\PhpParserDecorator($this->getService('defaultAnalysisParser'));
	}


	public function createServiceReflectionProvider(): PHPStan\Reflection\ReflectionProvider
	{
		return $this->getService('reflectionProviderFactory')->create();
	}


	public function createServiceReflectionProviderFactory(): PHPStan\Reflection\ReflectionProvider\ReflectionProviderFactory
	{
		return new PHPStan\Reflection\ReflectionProvider\ReflectionProviderFactory(
			$this->getService('runtimeReflectionProvider'),
			$this->getService('betterReflectionProvider'),
			false
		);
	}


	public function createServiceRegistry(): PHPStan\Rules\Registry
	{
		return $this->getService('0110')->create();
	}


	public function createServiceRelativePathHelper(): PHPStan\File\RelativePathHelper
	{
		return new PHPStan\File\FuzzyRelativePathHelper(
			$this->getService('parentDirectoryRelativePathHelper'),
			'/home/gamecharmer/repositories/Database',
			$this->parameters['analysedPaths']
		);
	}


	public function createServiceRules__0(): PHPStan\Rules\Debug\DumpTypeRule
	{
		return new PHPStan\Rules\Debug\DumpTypeRule($this->getService('reflectionProvider'));
	}


	public function createServiceRules__1(): PHPStan\Rules\Debug\FileAssertRule
	{
		return new PHPStan\Rules\Debug\FileAssertRule($this->getService('reflectionProvider'));
	}


	public function createServiceRuntimeReflectionProvider(): PHPStan\Reflection\ReflectionProvider\ClassBlacklistReflectionProvider
	{
		return new PHPStan\Reflection\ReflectionProvider\ClassBlacklistReflectionProvider(
			$this->getService('innerRuntimeReflectionProvider'),
			$this->getService('0249'),
			[
				'#^PhpParser\\\#i',
				'#^PHPStan\\\#i',
				'#^Hoa\\\#i',
				'#^Symfony\\\Polyfill\\\Php80\\\#i',
				'#^Symfony\\\Polyfill\\\Mbstring\\\#i',
				'#^Symfony\\\Polyfill\\\Intl\\\Normalizer\\\#i',
				'#^Symfony\\\Polyfill\\\Php73\\\#i',
				'#^Symfony\\\Polyfill\\\Php74\\\#i',
				'#^Symfony\\\Polyfill\\\Php72\\\#i',
				'#^Symfony\\\Polyfill\\\Intl\\\Grapheme\\\#i',
				'#^Composer\\\#i',
				'#^ReflectionUnionType$#i',
				'#^Attribute$#i',
				'#^ReturnTypeWillChange$#i',
				'#^ReflectionIntersectionType$#i',
				'#^UnitEnum$#i',
				'#^BackedEnum$#i',
				'#^ReflectionEnum$#i',
				'#^ReflectionEnumUnitCase$#i',
				'#^ReflectionEnumBackedCase$#i',
			],
			$this->parameters['singleReflectionInsteadOfFile']
		);
	}


	public function createServiceSimpleRelativePathHelper(): PHPStan\File\RelativePathHelper
	{
		return new PHPStan\File\SimpleRelativePathHelper('/home/gamecharmer/repositories/Database');
	}


	public function createServiceStubPhpDocProvider(): PHPStan\PhpDoc\StubPhpDocProvider
	{
		return new PHPStan\PhpDoc\StubPhpDocProvider(
			$this->getService('defaultAnalysisParser'),
			$this->getService('0113'),
			$this->getService('037'),
			[
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionAttribute.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionClass.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionClassConstant.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionFunctionAbstract.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionParameter.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ReflectionProperty.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/iterable.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ArrayObject.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/WeakReference.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/ext-ds.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/PDOStatement.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/date.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/mysqli.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/zip.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/dom.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/spl.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/SplObjectStorage.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/Exception.stub',
				'phar:///home/gamecharmer/repositories/Database/vendor/phpstan/phpstan/phpstan.phar/stubs/arrayFunctions.stub',
			]
		);
	}


	public function createServiceTypeSpecifier(): PHPStan\Analyser\TypeSpecifier
	{
		return $this->getService('typeSpecifierFactory')->create();
	}


	public function createServiceTypeSpecifierFactory(): PHPStan\Analyser\TypeSpecifierFactory
	{
		return new PHPStan\Analyser\TypeSpecifierFactory($this->getService('037'));
	}


	public function initialize()
	{
	}
}
