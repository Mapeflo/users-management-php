<?php

declare(strict_types=1);

final class ClassLoader
{
    /**
     * @var array<string, string>
     */
    private static array $classMap = array(
        'InvalidUserEmailException' => 'Domain/Exceptions/InvalidUserEmailException.php',
        'InvalidUserIdException' => 'Domain/Exceptions/InvalidUserIdException.php',
        'InvalidUserNameException' => 'Domain/Exceptions/InvalidUserNameException.php',
        'InvalidUserPasswordException' => 'Domain/Exceptions/InvalidUserPasswordException.php',
        'InvalidUserRoleException' => 'Domain/Exceptions/InvalidUserRoleException.php',
        'InvalidUserStatusException' => 'Domain/Exceptions/InvalidUserStatusException.php',
        'UserAlreadyExistsException' => 'Domain/Exceptions/UserAlreadyExistsException.php',
        'UserNotFoundException' => 'Domain/Exceptions/UserNotFoundException.php',
        'InvalidCredentialsException' => 'Domain/Exceptions/InvalidCredentialsException.php',

        'UserRoleEnum' => 'Domain/Enums/UserRoleEnum.php',
        'UserStatusEnum' => 'Domain/Enums/UserStatusEnum.php',

        'UserId' => 'Domain/ValueObjects/UserId.php',
        'UserName' => 'Domain/ValueObjects/UserName.php',
        'UserEmail' => 'Domain/ValueObjects/UserEmail.php',
        'UserPassword' => 'Domain/ValueObjects/UserPassword.php',

        'UserModel' => 'Domain/Models/UserModel.php',
        'EmailDestinationModel' => 'Domain/Models/EmailDestinationModel.php',
        'EmailSenderException' => 'Domain/Exceptions/EmailSenderException.php',
        'EmailSenderPort' => 'Application/Ports/Out/EmailSenderPort.php',
        'EmailNotificationService' => 'Application/Services/EmailNotificationService.php',
        'EmailSenderService' => 'Infrastructure/Adapters/Email/EmailSenderService.php',

        'CreateUserUseCase' => 'Application/Ports/In/CreateUserUseCase.php',
        'UpdateUserUseCase' => 'Application/Ports/In/UpdateUserUseCase.php',
        'GetUserByIdUseCase' => 'Application/Ports/In/GetUserByIdUseCase.php',
        'GetAllUsersUseCase' => 'Application/Ports/In/GetAllUsersUseCase.php',
        'DeleteUserUseCase' => 'Application/Ports/In/DeleteUserUseCase.php',
        'LoginUseCase' => 'Application/Ports/In/LoginUseCase.php',

        'SaveUserPort' => 'Application/Ports/Out/SaveUserPort.php',
        'UpdateUserPort' => 'Application/Ports/Out/UpdateUserPort.php',
        'GetUserByIdPort' => 'Application/Ports/Out/GetUserByIdPort.php',
        'GetUserByEmailPort' => 'Application/Ports/Out/GetUserByEmailPort.php',
        'GetAllUsersPort' => 'Application/Ports/Out/GetAllUsersPort.php',
        'DeleteUserPort' => 'Application/Ports/Out/DeleteUserPort.php',

        'CreateUserCommand' => 'Application/Services/Dto/Commands/CreateUserCommand.php',
        'UpdateUserCommand' => 'Application/Services/Dto/Commands/UpdateUserCommand.php',
        'DeleteUserCommand' => 'Application/Services/Dto/Commands/DeleteUserCommand.php',
        'LoginCommand' => 'Application/Services/Dto/Commands/LoginCommand.php',
        'GetUserByIdQuery' => 'Application/Services/Dto/Queries/GetUserByIdQuery.php',
        'GetAllUsersQuery' => 'Application/Services/Dto/Queries/GetAllUsersQuery.php',

        'CreateUserService' => 'Application/Services/CreateUserService.php',
        'UpdateUserService' => 'Application/Services/UpdateUserService.php',
        'GetUserByIdService' => 'Application/Services/GetUserByIdService.php',
        'GetAllUsersService' => 'Application/Services/GetAllUsersService.php',
        'DeleteUserService' => 'Application/Services/DeleteUserService.php',
        'LoginService' => 'Application/Services/LoginService.php',
        'UserApplicationMapper' => 'Application/Services/Mappers/UserApplicationMapper.php',

        'Connection' => 'Infrastructure/Adapters/Persistence/MySQL/Config/Connection.php',
        'UserPersistenceDto' => 'Infrastructure/Adapters/Persistence/MySQL/Dto/UserPersistenceDto.php',
        'UserEntity' => 'Infrastructure/Adapters/Persistence/MySQL/Entity/UserEntity.php',
        'UserPersistenceMapper' => 'Infrastructure/Adapters/Persistence/MySQL/Mapper/UserPersistenceMapper.php',
        'UserRepositoryMySQL' => 'Infrastructure/Adapters/Persistence/MySQL/Repository/UserRepositoryMySQL.php',

        'CreateUserWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/CreateUserRequest.php',
        'UpdateUserWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/UpdateUserRequest.php',
        'LoginWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/LoginWebRequest.php',
        'UserResponse' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/UserResponse.php',
        'UserWebMapper' => 'Infrastructure/Entrypoints/Web/Controllers/Mapper/UserWebMapper.php',
        'UserController' => 'Infrastructure/Entrypoints/Web/Controllers/UserController.php',
        'WebRoutes' => 'Infrastructure/Entrypoints/Web/Controllers/Config/WebRoutes.php',

        'View' => 'Infrastructure/Entrypoints/Web/Presentation/View.php',
        'Flash' => 'Infrastructure/Entrypoints/Web/Presentation/Flash.php',

        'DependencyInjection' => 'Common/DependencyInjection.php',

         // ===== Carrera Académica =====
        'InvalidCarreraAcademicaIdException' => 'Domain/Exceptions/InvalidCarreraAcademicaIdException.php',
        'InvalidCarreraAcademicaNombreException' => 'Domain/Exceptions/InvalidCarreraAcademicaNombreException.php',
        'InvalidCarreraAcademicaNumCreditosException' => 'Domain/Exceptions/InvalidCarreraAcademicaNumCreditosException.php',
        'InvalidCarreraAcademicaNumAsignaturasException' => 'Domain/Exceptions/InvalidCarreraAcademicaNumAsignaturasException.php',
        'InvalidCarreraAcademicaNumSemestresException' => 'Domain/Exceptions/InvalidCarreraAcademicaNumSemestresException.php',
        'InvalidCarreraAcademicaNivelFormacionException' => 'Domain/Exceptions/InvalidCarreraAcademicaNivelFormacionException.php',
        'InvalidCarreraAcademicaTituloException' => 'Domain/Exceptions/InvalidCarreraAcademicaTituloException.php',
        'InvalidCarreraAcademicaValorSemestreException' => 'Domain/Exceptions/InvalidCarreraAcademicaValorSemestreException.php',
        'InvalidCarreraAcademicaUniversidadException' => 'Domain/Exceptions/InvalidCarreraAcademicaUniversidadException.php',
        'InvalidCarreraAcademicaAreaConocimientoException' => 'Domain/Exceptions/InvalidCarreraAcademicaAreaConocimientoException.php',
        'CarreraAcademicaNotFoundException' => 'Domain/Exceptions/CarreraAcademicaNotFoundException.php',
        'CarreraAcademicaAlreadyExistsException' => 'Domain/Exceptions/CarreraAcademicaAlreadyExistsException.php',

        'NivelFormacionEnum' => 'Domain/Enums/NivelFormacionEnum.php',

        'CarreraAcademicaId' => 'Domain/ValueObjects/CarreraAcademicaId.php',
        'CarreraAcademicaNombre' => 'Domain/ValueObjects/CarreraAcademicaNombre.php',
        'CarreraAcademicaNumCreditos' => 'Domain/ValueObjects/CarreraAcademicaNumCreditos.php',
        'CarreraAcademicaNumAsignaturas' => 'Domain/ValueObjects/CarreraAcademicaNumAsignaturas.php',
        'CarreraAcademicaNumSemestres' => 'Domain/ValueObjects/CarreraAcademicaNumSemestres.php',
        'CarreraAcademicaNivelFormacion' => 'Domain/ValueObjects/CarreraAcademicaNivelFormacion.php',
        'CarreraAcademicaTitulo' => 'Domain/ValueObjects/CarreraAcademicaTitulo.php',
        'CarreraAcademicaValorSemestre' => 'Domain/ValueObjects/CarreraAcademicaValorSemestre.php',
        'CarreraAcademicaUniversidad' => 'Domain/ValueObjects/CarreraAcademicaUniversidad.php',
        'CarreraAcademicaEsAcreditada' => 'Domain/ValueObjects/CarreraAcademicaEsAcreditada.php',
        'CarreraAcademicaAreaConocimiento' => 'Domain/ValueObjects/CarreraAcademicaAreaConocimiento.php',

        'CarreraAcademicaModel' => 'Domain/Models/CarreraAcademicaModel.php',

        'CarreraAcademicaCreatedDomainEvent' => 'Domain/Events/CarreraAcademicaCreatedDomainEvent.php',
        'CarreraAcademicaUpdatedDomainEvent' => 'Domain/Events/CarreraAcademicaUpdatedDomainEvent.php',
        'CarreraAcademicaDeletedDomainEvent' => 'Domain/Events/CarreraAcademicaDeletedDomainEvent.php',

        'SaveCarreraAcademicaPort' => 'Application/Ports/Out/SaveCarreraAcademicaPort.php',
        'GetCarreraAcademicaByIdPort' => 'Application/Ports/Out/GetCarreraAcademicaByIdPort.php',
        'GetAllCarrerasAcademicasPort' => 'Application/Ports/Out/GetAllCarrerasAcademicasPort.php',
        'UpdateCarreraAcademicaPort' => 'Application/Ports/Out/UpdateCarreraAcademicaPort.php',
        'DeleteCarreraAcademicaPort' => 'Application/Ports/Out/DeleteCarreraAcademicaPort.php',

        'CreateCarreraAcademicaUseCase' => 'Application/Ports/In/CreateCarreraAcademicaUseCase.php',
        'GetCarreraAcademicaByIdUseCase' => 'Application/Ports/In/GetCarreraAcademicaByIdUseCase.php',
        'GetAllCarrerasAcademicasUseCase' => 'Application/Ports/In/GetAllCarrerasAcademicasUseCase.php',
        'UpdateCarreraAcademicaUseCase' => 'Application/Ports/In/UpdateCarreraAcademicaUseCase.php',
        'DeleteCarreraAcademicaUseCase' => 'Application/Ports/In/DeleteCarreraAcademicaUseCase.php',

        'CreateCarreraAcademicaCommand' => 'Application/Services/Dto/Commands/CreateCarreraAcademicaCommand.php',
        'UpdateCarreraAcademicaCommand' => 'Application/Services/Dto/Commands/UpdateCarreraAcademicaCommand.php',
        'DeleteCarreraAcademicaCommand' => 'Application/Services/Dto/Commands/DeleteCarreraAcademicaCommand.php',
        'GetCarreraAcademicaByIdQuery' => 'Application/Services/Dto/Queries/GetCarreraAcademicaByIdQuery.php',
        'GetAllCarrerasAcademicasQuery' => 'Application/Services/Dto/Queries/GetAllCarrerasAcademicasQuery.php',

        'CarreraAcademicaApplicationMapper' => 'Application/Services/Mappers/CarreraAcademicaApplicationMapper.php',
        'CreateCarreraAcademicaService' => 'Application/Services/CreateCarreraAcademicaService.php',
        'GetCarreraAcademicaByIdService' => 'Application/Services/GetCarreraAcademicaByIdService.php',
        'GetAllCarrerasAcademicasService' => 'Application/Services/GetAllCarrerasAcademicasService.php',
        'UpdateCarreraAcademicaService' => 'Application/Services/UpdateCarreraAcademicaService.php',
        'DeleteCarreraAcademicaService' => 'Application/Services/DeleteCarreraAcademicaService.php',

        'CarreraAcademicaEntity' => 'Infrastructure/Adapters/Persistence/MySQL/Entity/CarreraAcademicaEntity.php',
        'CarreraAcademicaMapper' => 'Infrastructure/Adapters/Persistence/MySQL/Mapper/CarreraAcademicaMapper.php',
        'CarreraAcademicaMySQLRepository' => 'Infrastructure/Adapters/Persistence/MySQL/Repository/CarreraAcademicaMySQLRepository.php',

        'CarreraAcademicaController' => 'Infrastructure/Entrypoints/Web/Controllers/CarreraAcademicaController.php',
    );

    public static function register(): void
    {
        spl_autoload_register(array(self::class, 'loadClass'));
    }

    public static function loadClass(string $className): void
    {
        if (!isset(self::$classMap[$className])) {
            return;
        }

        $baseDir = dirname(__DIR__) . DIRECTORY_SEPARATOR;
        $filePath = $baseDir . self::$classMap[$className];

        if (!file_exists($filePath)) {
            throw new RuntimeException(
                sprintf('No se encontró el archivo para la clase %s en %s', $className, $filePath)
            );
        }

        require_once $filePath;
    }
}