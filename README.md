# Users Management PHP - Arquitectura Hexagonal + DDD + CQRS

Aplicación web desarrollada en PHP para la gestión de **Usuarios** y **Carreras Académicas**, implementada con **Arquitectura Hexagonal**, **Domain-Driven Design (DDD)** y **CQRS**.

**Estudiante:** María Alejandra Peñaranda Flórez  
**Correo:** mpenarandaf@unicartagena.edu.co  
**Caso asignado:** 23 - Carrera Académica  
**Universidad de Cartagena** - Desarrollo Web - Unidad 2

---

## Tecnologías

- PHP 8.2+
- MySQL
- Docker & Docker Compose
- Arquitectura Hexagonal (Ports & Adapters)
- Domain-Driven Design (DDD)
- CQRS
- GitHub Actions (CI)
- Render (Despliegue en la nube)
- Aiven (Base de datos en la nube)

---

## Funcionalidades

### Usuarios
- Crear, listar, ver, editar y eliminar usuarios
- Autenticación con sesión (login / logout)
- Recuperación de contraseña

### Carreras Académicas (Caso 23)
- Crear, listar, editar y eliminar carreras académicas
- Campos: nombre, número de créditos, número de asignaturas, número de semestres, nivel de formación, título, valor del semestre, universidad, si es acreditada, perfiles y área de conocimiento

---

## Cómo ejecutar el proyecto

### 1. Con Docker (recomendado)

```bash
docker-compose up --build

Luego abre: http://localhost:8080

### Localmente (XAMPP)
-Clona el repositorio
-Configura el archivo .env basándote en .env.example
-Crea las tablas en MySQL
-Accede a: http://localhost/users-management-php/public

### Despliegue en producción:
-URL de producción: https://users-management-php.onrender.com
-Base de datos: Aiven MySQL
-Auto-Deploy activado desde GitHub

### Credenciales de prueba:
-Correo: admin@crud.com
-Contraseña: password

## Conceptos aplicados

### Arquitectura general
- Arquitectura Hexagonal (Ports & Adapters)
- DDD (Domain-Driven Design)
- CQRS
- Capas: Domain / Application / Infrastructure / Entrypoints
- Front Controller · Single Entry Point

### Capa de Dominio
- Rich Domain Model
- Value Objects
- Named Constructors
- Domain Exceptions
- Domain Events
- Enumerations (Enums)
- Ubiquitous Language
- Inmutabilidad
- Fail-fast validation
- Encapsulación de reglas de negocio


### Capa de Aplicación
- Use Cases
- Application Services
- Ports In (interfaces de casos de uso)
- Ports Out (interfaces de persistencia)
- Commands y Queries
- DTOs
- Anti-corruption Layer
- Application Mapper


### Capa de Infraestructura
- Repository Pattern
- Data Mapper
- Persistence DTO
- Persistence Entity
- PDO con Prepared Statements
- Adapter Pattern

### Principios SOLID
- **SRP** — Single Responsibility Principle
- **OCP** — Open/Closed Principle
- **LSP** — Liskov Substitution Principle
- **ISP** — Interface Segregation Principle
- **DIP** — Dependency Inversion Principle

### Principios de Clean Code
-declare(strict_types=1) en todos los archivos
-Clases final
-Value Objects inmutables
-Named Constructors
-Fail-fast
-Separación estricta de capas



