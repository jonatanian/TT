USE [master]
GO
/****** Object:  Database [SISACMPL]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE DATABASE [SISACMPL]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'SISACMPL', FILENAME = N'C:\Program Files (x86)\Microsoft SQL Server\MSSQL12.MSSQLSERVER\MSSQL\DATA\SISACMPL.mdf' , SIZE = 4288KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'SISACMPL_log', FILENAME = N'C:\Program Files (x86)\Microsoft SQL Server\MSSQL12.MSSQLSERVER\MSSQL\DATA\SISACMPL_log.ldf' , SIZE = 1072KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [SISACMPL] SET COMPATIBILITY_LEVEL = 120
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [SISACMPL].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [SISACMPL] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [SISACMPL] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [SISACMPL] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [SISACMPL] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [SISACMPL] SET ARITHABORT OFF 
GO
ALTER DATABASE [SISACMPL] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [SISACMPL] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [SISACMPL] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [SISACMPL] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [SISACMPL] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [SISACMPL] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [SISACMPL] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [SISACMPL] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [SISACMPL] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [SISACMPL] SET  ENABLE_BROKER 
GO
ALTER DATABASE [SISACMPL] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [SISACMPL] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [SISACMPL] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [SISACMPL] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [SISACMPL] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [SISACMPL] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [SISACMPL] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [SISACMPL] SET RECOVERY FULL 
GO
ALTER DATABASE [SISACMPL] SET  MULTI_USER 
GO
ALTER DATABASE [SISACMPL] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [SISACMPL] SET DB_CHAINING OFF 
GO
ALTER DATABASE [SISACMPL] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [SISACMPL] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
ALTER DATABASE [SISACMPL] SET DELAYED_DURABILITY = DISABLED 
GO
EXEC sys.sp_db_vardecimal_storage_format N'SISACMPL', N'ON'
GO
USE [SISACMPL]
GO
/****** Object:  Table [dbo].[anexo]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[anexo](
	[IdAnexo] [int] IDENTITY(1,1) NOT NULL,
	[Anexo] [nvarchar](250) NULL,
	[Correspondencia_Id] [int] NOT NULL,
 CONSTRAINT [PK_anexo_IdAnexo] PRIMARY KEY CLUSTERED 
(
	[IdAnexo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[area]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[area](
	[IdArea] [int] IDENTITY(1,1) NOT NULL,
	[NombreArea] [nvarchar](100) NOT NULL,
	[Objetivo_Id] [int] NULL,
	[Organigrama_Id] [int] NULL,
 CONSTRAINT [PK_area_IdArea] PRIMARY KEY CLUSTERED 
(
	[IdArea] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[area_tiene_secciones]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[area_tiene_secciones](
	[IdATS] [int] IDENTITY(1,1) NOT NULL,
	[Area_Id] [int] NULL,
	[Secciones_Id] [int] NULL,
	[TipoDeContenido_Id] [int] NULL,
	[FechaCreacion] [date] NULL,
	[FechaEdicion] [date] NULL,
	[Precedencia] [int] NULL,
	[CreadoPor] [int] NULL,
	[EditadoPor] [int] NULL,
 CONSTRAINT [PK_area_tiene_secciones_IdATS] PRIMARY KEY CLUSTERED 
(
	[IdATS] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[caracter]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[caracter](
	[IdCaracter] [int] IDENTITY(1,1) NOT NULL,
	[NombreCaracter] [nvarchar](20) NULL,
 CONSTRAINT [PK_caracter_IdCaracter] PRIMARY KEY CLUSTERED 
(
	[IdCaracter] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[cargo]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[cargo](
	[IdCargo] [int] IDENTITY(1,1) NOT NULL,
	[NombreCargo] [nvarchar](100) NOT NULL,
	[DescripcionCargo] [nvarchar](150) NULL,
 CONSTRAINT [PK_cargo_IdCargo] PRIMARY KEY CLUSTERED 
(
	[IdCargo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[cargo_entidad]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[cargo_entidad](
	[IdCargoEntidad] [int] IDENTITY(1,1) NOT NULL,
	[NombreCargoEntidad] [nvarchar](100) NULL,
 CONSTRAINT [PK_cargo_entidad_IdCargoEntidad] PRIMARY KEY CLUSTERED 
(
	[IdCargoEntidad] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[ccopia_para]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ccopia_para](
	[IdCCP] [int] IDENTITY(1,1) NOT NULL,
	[EstatusCCP_Id] [int] NOT NULL,
	[Correspondencia_Id] [int] NOT NULL,
	[Usuario_Id] [int] NOT NULL,
 CONSTRAINT [PK_ccopia_para_IdCCP] PRIMARY KEY CLUSTERED 
(
	[IdCCP] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[contenido]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[contenido](
	[IdContenido] [int] IDENTITY(1,1) NOT NULL,
	[NombreODescripcion] [nvarchar](900) NULL,
	[AccionesOMetas] [nvarchar](900) NULL,
	[FechaCreacion] [date] NULL,
	[FechaEdicion] [date] NULL,
	[ATS_Id] [int] NULL,
	[CreadoPor] [int] NULL,
	[EditadoPor] [int] NULL,
	[ExtensionDoc] [nvarchar](10) NULL,
 CONSTRAINT [PK_contenido_IdContenido] PRIMARY KEY CLUSTERED 
(
	[IdContenido] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[correspondencia]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[correspondencia](
	[IdCorrespondencia] [int] IDENTITY(1,1) NOT NULL,
	[FechaEmision] [date] NULL,
	[FechaEntrega] [date] NULL,
	[Asunto] [nvarchar](250) NULL,
	[RequiereRespuesta] [smallint] NULL,
	[URLPDF] [nvarchar](500) NULL,
	[FechaLimiteR] [date] NULL,
	[EnRespuestaA] [int] NULL,
	[Estatus_Id] [int] NULL,
	[Prioridad_Id] [int] NULL,
	[Caracter_Id] [int] NULL,
 CONSTRAINT [PK_correspondencia_IdCorrespondencia] PRIMARY KEY CLUSTERED 
(
	[IdCorrespondencia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[datos_confidenciales]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[datos_confidenciales](
	[IdDatos] [int] IDENTITY(1,1) NOT NULL,
	[Dato] [nvarchar](250) NULL,
	[Correspondencia_Id] [int] NOT NULL,
 CONSTRAINT [PK_datos_confidenciales_IdDatos] PRIMARY KEY CLUSTERED 
(
	[IdDatos] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[dependencia]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dependencia](
	[IdDependencia] [int] IDENTITY(1,1) NOT NULL,
	[NombreDependencia] [nvarchar](200) NOT NULL,
	[AcronimoDependencia] [nvarchar](20) NULL,
 CONSTRAINT [PK_dependencia_IdDependencia] PRIMARY KEY CLUSTERED 
(
	[IdDependencia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[dependencia_area]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dependencia_area](
	[IdDependenciaArea] [int] IDENTITY(1,1) NOT NULL,
	[NombreDependenciaArea] [nvarchar](150) NULL,
 CONSTRAINT [PK_dependencia_area_IdDependenciaArea] PRIMARY KEY CLUSTERED 
(
	[IdDependenciaArea] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[dependencia_tiene_area]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dependencia_tiene_area](
	[IdDependenciaTieneArea] [int] IDENTITY(1,1) NOT NULL,
	[Dependencia_Id] [int] NULL,
	[DepArea_Id] [int] NULL,
 CONSTRAINT [PK_dependencia_tiene_area_IdDependenciaTieneArea] PRIMARY KEY CLUSTERED 
(
	[IdDependenciaTieneArea] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[descripcion]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[descripcion](
	[IdDescripcion] [int] IDENTITY(1,1) NOT NULL,
	[Secciones_Id] [int] NULL,
	[SecDeArea] [int] NULL,
	[Descripcion] [nvarchar](900) NULL,
	[FechaCreacion] [date] NULL,
	[FechaEdicion] [date] NULL,
	[CreadoPor] [int] NULL,
	[EditadoPor] [int] NULL,
 CONSTRAINT [PK_descripcion_IdDescripcion] PRIMARY KEY CLUSTERED 
(
	[IdDescripcion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[entidad_externa]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[entidad_externa](
	[IdEntidadExterna] [int] IDENTITY(1,1) NOT NULL,
	[GradoAcademico] [nvarchar](10) NULL,
	[NombreEntidad] [nvarchar](50) NULL,
	[ApPaternoEntidad] [nvarchar](50) NULL,
	[ApMaternoEntidad] [nvarchar](50) NULL,
	[DepArea_Cargo_Id] [int] NULL,
	[Dependencia_Area_Id] [int] NULL,
 CONSTRAINT [PK_entidad_externa_IdEntidadExterna] PRIMARY KEY CLUSTERED 
(
	[IdEntidadExterna] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[estatus]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[estatus](
	[IdEstatus] [int] NOT NULL,
	[NombreEstatus] [nvarchar](150) NOT NULL,
 CONSTRAINT [PK_estatus_IdEstatus] PRIMARY KEY CLUSTERED 
(
	[IdEstatus] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[estatus_ccp]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[estatus_ccp](
	[IdEstatusCCP] [int] IDENTITY(1,1) NOT NULL,
	[NombreEstatusCPP] [nvarchar](45) NULL,
 CONSTRAINT [PK_estatus_ccp_IdEstatusCCP] PRIMARY KEY CLUSTERED 
(
	[IdEstatusCCP] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[grado_academico]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[grado_academico](
	[IdGrado] [int] IDENTITY(1,1) NOT NULL,
	[NombreGrado] [nvarchar](50) NULL,
	[Abreviatura] [nvarchar](30) NULL,
 CONSTRAINT [PK_grado_academico_IdGrado] PRIMARY KEY CLUSTERED 
(
	[IdGrado] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[memorandum]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[memorandum](
	[IdConsecutivoMemo] [int] IDENTITY(1,1) NOT NULL,
	[IdMemorandum] [nvarchar](25) NOT NULL,
	[Correspondencia_Id] [int] NOT NULL,
	[Usuario_Id] [int] NOT NULL,
	[Usuario_Cargo] [int] NULL,
	[Usuaerio_Area] [int] NULL,
 CONSTRAINT [PK_memorandum_IdConsecutivoMemo] PRIMARY KEY CLUSTERED 
(
	[IdConsecutivoMemo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[objetivo]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[objetivo](
	[IdObjetivo] [int] IDENTITY(1,1) NOT NULL,
	[Objetivo] [nvarchar](900) NULL,
	[FechaEdicion] [date] NULL,
	[EditadoPor] [int] NULL,
 CONSTRAINT [PK_objetivo_IdObjetivo] PRIMARY KEY CLUSTERED 
(
	[IdObjetivo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[observaciones]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[observaciones](
	[IdObservaciones] [int] IDENTITY(1,1) NOT NULL,
	[Oficio_Saliente_Id] [int] NULL,
	[DescripcionObservaciones] [nvarchar](250) NULL,
	[VistoBueno] [smallint] NULL,
	[Observacion_Usuario_Id] [int] NULL,
 CONSTRAINT [PK_observaciones_IdObservaciones] PRIMARY KEY CLUSTERED 
(
	[IdObservaciones] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[oficio_entrante]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[oficio_entrante](
	[IdOficioEntrante] [int] IDENTITY(1,1) NOT NULL,
	[IdOficioDependencia] [nvarchar](25) NULL,
	[DirigidoA] [int] NOT NULL,
	[CargoDirigidoA_Id] [int] NULL,
	[AreaRecibe_Id] [int] NULL,
	[Correspondencia_Id] [int] NULL,
	[Emisor] [int] NOT NULL,
	[CargoEmisor_Id] [int] NOT NULL,
	[AreaEmite] [int] NOT NULL,
	[DependenciaEmite] [int] NOT NULL,
 CONSTRAINT [PK_oficio_entrante_IdOficioEntrante] PRIMARY KEY CLUSTERED 
(
	[IdOficioEntrante] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[oficio_saliente]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[oficio_saliente](
	[IdConsecutivo] [int] IDENTITY(1,1) NOT NULL,
	[IdOficioSaliente] [nvarchar](25) NOT NULL,
	[Correspondencia_Id] [int] NOT NULL,
	[Usuario_Id] [int] NOT NULL,
	[Usuario_Cargo] [int] NULL,
	[Usuario_Area] [int] NULL,
	[URLAcuse] [nvarchar](150) NULL,
	[FechaAcuse] [date] NULL,
	[Destinatario] [int] NOT NULL,
	[AreaDestinada] [int] NOT NULL,
	[Dependencia] [int] NOT NULL,
 CONSTRAINT [PK_oficio_saliente_IdConsecutivo] PRIMARY KEY CLUSTERED 
(
	[IdConsecutivo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[organigrama]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[organigrama](
	[IdOrganigrama] [int] IDENTITY(1,1) NOT NULL,
	[OrganigramaURL] [nvarchar](900) NULL,
	[FechaEdicion] [date] NULL,
	[EditadoPor] [int] NULL,
 CONSTRAINT [PK_organigrama_IdOrganigrama] PRIMARY KEY CLUSTERED 
(
	[IdOrganigrama] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[prioridad]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[prioridad](
	[IdPrioridad] [int] IDENTITY(1,1) NOT NULL,
	[NombrePrioridad] [nvarchar](6) NOT NULL,
 CONSTRAINT [PK_prioridad_IdPrioridad] PRIMARY KEY CLUSTERED 
(
	[IdPrioridad] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[rol]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[rol](
	[IdRol] [int] IDENTITY(1,1) NOT NULL,
	[NombreRol] [nvarchar](50) NOT NULL,
	[DescripcionRol] [nvarchar](200) NULL,
 CONSTRAINT [PK_rol_IdRol] PRIMARY KEY CLUSTERED 
(
	[IdRol] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[secciones]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[secciones](
	[IdSeccion] [int] IDENTITY(1,1) NOT NULL,
	[NombreSeccion] [nvarchar](200) NULL,
	[FechaCreacion] [date] NULL,
	[FechaEdicion] [date] NULL,
	[CreadoPor] [int] NULL,
	[EditadoPor] [int] NULL,
 CONSTRAINT [PK_secciones_IdSeccion] PRIMARY KEY CLUSTERED 
(
	[IdSeccion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[subarea]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[subarea](
	[IdSubArea] [int] IDENTITY(1,1) NOT NULL,
	[NombreSubArea] [nvarchar](100) NULL,
	[Objetivo_Id] [int] NULL,
	[Organigrama_Id] [int] NULL,
	[Area_Id] [int] NULL,
 CONSTRAINT [PK_subarea_IdSubArea] PRIMARY KEY CLUSTERED 
(
	[IdSubArea] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[tipodecontenido]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tipodecontenido](
	[IdTipoDeContenido] [int] IDENTITY(1,1) NOT NULL,
	[NombreContenido] [nvarchar](100) NOT NULL,
 CONSTRAINT [PK_tipodecontenido_IdTipoDeContenido] PRIMARY KEY CLUSTERED 
(
	[IdTipoDeContenido] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[usuario]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[usuario](
	[IdUsuario] [int] IDENTITY(1,1) NOT NULL,
	[GradoAcademico] [int] NULL,
	[Nombre] [nvarchar](50) NOT NULL,
	[ApPaterno] [nvarchar](50) NOT NULL,
	[ApMaterno] [nvarchar](50) NOT NULL,
	[Email] [nvarchar](30) NOT NULL,
	[Password] [nvarchar](255) NOT NULL,
	[Extension] [int] NOT NULL,
	[FechaInicio] [date] NULL,
	[FechaFin] [date] NULL,
	[URLCV] [nvarchar](150) NULL,
	[Activo] [smallint] NULL,
	[Rol_Id] [int] NULL,
	[Area_Id] [int] NULL,
	[SubArea_Id] [int] NULL,
	[Cargo_Id] [int] NULL,
	[updated_at] [date] NULL,
	[created_at] [date] NULL,
	[remember_token] [nvarchar](300) NULL,
 CONSTRAINT [PK_usuario_IdUsuario] PRIMARY KEY CLUSTERED 
(
	[IdUsuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[usuario_turna_correspondencia]    Script Date: 04/02/2016 01:05:28 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[usuario_turna_correspondencia](
	[IdUTC] [int] IDENTITY(1,1) NOT NULL,
	[Usuario_Id] [int] NOT NULL,
	[Correspondencia_Id] [int] NOT NULL,
	[UTC_TurnarA_Id] [int] NOT NULL,
	[FechaTurnadoA] [date] NOT NULL,
	[Activo] [smallint] NULL,
 CONSTRAINT [PK_usuario_turna_correspondencia_IdUTC] PRIMARY KEY CLUSTERED 
(
	[IdUTC] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Index [fk_ANEXO_CORRESPONDENCIA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_ANEXO_CORRESPONDENCIA1_idx] ON [dbo].[anexo]
(
	[Correspondencia_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_AREA_OBJETIVO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_AREA_OBJETIVO1_idx] ON [dbo].[area]
(
	[Objetivo_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_AREA_ORGANIGRAMA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_AREA_ORGANIGRAMA1_idx] ON [dbo].[area]
(
	[Organigrama_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_AREA_TIENE_SECCIONES_AREA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_AREA_TIENE_SECCIONES_AREA1_idx] ON [dbo].[area_tiene_secciones]
(
	[Area_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_AREA_TIENE_SECCIONES_SECCIONES1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_AREA_TIENE_SECCIONES_SECCIONES1_idx] ON [dbo].[area_tiene_secciones]
(
	[Secciones_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_AREA_TIENE_SECCIONES_TipoDeContenido1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_AREA_TIENE_SECCIONES_TipoDeContenido1_idx] ON [dbo].[area_tiene_secciones]
(
	[TipoDeContenido_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_AREA_TIENE_SECCIONES_USUARIO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_AREA_TIENE_SECCIONES_USUARIO1_idx] ON [dbo].[area_tiene_secciones]
(
	[CreadoPor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_AREA_TIENE_SECCIONES_USUARIO2_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_AREA_TIENE_SECCIONES_USUARIO2_idx] ON [dbo].[area_tiene_secciones]
(
	[EditadoPor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_CCOPIA_PARA_CORRESPONDENCIA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_CCOPIA_PARA_CORRESPONDENCIA1_idx] ON [dbo].[ccopia_para]
(
	[Correspondencia_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_CCOPIA_PARA_ESTATUS_CCP1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_CCOPIA_PARA_ESTATUS_CCP1_idx] ON [dbo].[ccopia_para]
(
	[EstatusCCP_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_CCOPIA_PARA_USUARIO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_CCOPIA_PARA_USUARIO1_idx] ON [dbo].[ccopia_para]
(
	[Usuario_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_CONTENIDO_AREA_TIENE_SECCIONES1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_CONTENIDO_AREA_TIENE_SECCIONES1_idx] ON [dbo].[contenido]
(
	[ATS_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_CONTENIDO_USUARIO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_CONTENIDO_USUARIO1_idx] ON [dbo].[contenido]
(
	[CreadoPor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_CONTENIDO_USUARIO2_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_CONTENIDO_USUARIO2_idx] ON [dbo].[contenido]
(
	[EditadoPor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_CORRESPONDENCIA_CARACTER1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_CORRESPONDENCIA_CARACTER1_idx] ON [dbo].[correspondencia]
(
	[Caracter_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_CORRESPONDENCIA_CORRESPONDENCIA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_CORRESPONDENCIA_CORRESPONDENCIA1_idx] ON [dbo].[correspondencia]
(
	[EnRespuestaA] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_CORRESPONDENCIA_Estatus1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_CORRESPONDENCIA_Estatus1_idx] ON [dbo].[correspondencia]
(
	[Estatus_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_CORRESPONDENCIA_PRIORIDAD1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_CORRESPONDENCIA_PRIORIDAD1_idx] ON [dbo].[correspondencia]
(
	[Prioridad_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_DATOS_CONFIDENCIALES_CORRESPONDENCIA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_DATOS_CONFIDENCIALES_CORRESPONDENCIA1_idx] ON [dbo].[datos_confidenciales]
(
	[Correspondencia_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_DEPENDENCIA_TIENE_AREA_DEPENDENCIA_AREA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_DEPENDENCIA_TIENE_AREA_DEPENDENCIA_AREA1_idx] ON [dbo].[dependencia_tiene_area]
(
	[DepArea_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_DEPENDENCIA_TIENE_AREA_DEPENDENCIA1]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_DEPENDENCIA_TIENE_AREA_DEPENDENCIA1] ON [dbo].[dependencia_tiene_area]
(
	[Dependencia_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_DESCRIPCION_AREA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_DESCRIPCION_AREA1_idx] ON [dbo].[descripcion]
(
	[SecDeArea] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_DESCRIPCION_SECCIONES1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_DESCRIPCION_SECCIONES1_idx] ON [dbo].[descripcion]
(
	[Secciones_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_DESCRIPCION_USUARIO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_DESCRIPCION_USUARIO1_idx] ON [dbo].[descripcion]
(
	[CreadoPor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_DESCRIPCION_USUARIO2_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_DESCRIPCION_USUARIO2_idx] ON [dbo].[descripcion]
(
	[EditadoPor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_ENTIDAD_EXTERNA_DEPAREA_CARGO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_ENTIDAD_EXTERNA_DEPAREA_CARGO1_idx] ON [dbo].[entidad_externa]
(
	[DepArea_Cargo_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_ENTIDAD_EXTERNA_DEPENDENCIA_TIENE_AREA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_ENTIDAD_EXTERNA_DEPENDENCIA_TIENE_AREA1_idx] ON [dbo].[entidad_externa]
(
	[Dependencia_Area_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_MEMORANDUM_AREA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_MEMORANDUM_AREA1_idx] ON [dbo].[memorandum]
(
	[Usuaerio_Area] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_MEMORANDUM_CARGO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_MEMORANDUM_CARGO1_idx] ON [dbo].[memorandum]
(
	[Usuario_Cargo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_MEMORANDUM_CORRESPONDENCIA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_MEMORANDUM_CORRESPONDENCIA1_idx] ON [dbo].[memorandum]
(
	[Correspondencia_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_MEMORANDUM_USUARIO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_MEMORANDUM_USUARIO1_idx] ON [dbo].[memorandum]
(
	[Usuario_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OBJETIVO_USUARIO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OBJETIVO_USUARIO1_idx] ON [dbo].[objetivo]
(
	[EditadoPor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OBSERVACIONES_OFICIO_SALIENTE1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OBSERVACIONES_OFICIO_SALIENTE1_idx] ON [dbo].[observaciones]
(
	[Oficio_Saliente_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OBSERVACIONES_USUARIO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OBSERVACIONES_USUARIO1_idx] ON [dbo].[observaciones]
(
	[Observacion_Usuario_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OFICIO_ENTRANTE_AREA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OFICIO_ENTRANTE_AREA1_idx] ON [dbo].[oficio_entrante]
(
	[AreaRecibe_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OFICIO_ENTRANTE_CARGO_ENTIDAD1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OFICIO_ENTRANTE_CARGO_ENTIDAD1_idx] ON [dbo].[oficio_entrante]
(
	[CargoEmisor_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OFICIO_ENTRANTE_CARGO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OFICIO_ENTRANTE_CARGO1_idx] ON [dbo].[oficio_entrante]
(
	[CargoDirigidoA_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OFICIO_ENTRANTE_DEPENDENCIA_AREA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OFICIO_ENTRANTE_DEPENDENCIA_AREA1_idx] ON [dbo].[oficio_entrante]
(
	[AreaEmite] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OFICIO_ENTRANTE_DEPENDENCIA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OFICIO_ENTRANTE_DEPENDENCIA1_idx] ON [dbo].[oficio_entrante]
(
	[DependenciaEmite] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OFICIO_ENTRANTE_ENTIDAD_EXTERNA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OFICIO_ENTRANTE_ENTIDAD_EXTERNA1_idx] ON [dbo].[oficio_entrante]
(
	[Emisor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OFICIO_ENTRANTE_USUARIO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OFICIO_ENTRANTE_USUARIO1_idx] ON [dbo].[oficio_entrante]
(
	[DirigidoA] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OFICIOENTRANTE_CORRESPONDENCIA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OFICIOENTRANTE_CORRESPONDENCIA1_idx] ON [dbo].[oficio_entrante]
(
	[Correspondencia_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OFICIO_SALIENTE_AREA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OFICIO_SALIENTE_AREA1_idx] ON [dbo].[oficio_saliente]
(
	[Usuario_Area] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OFICIO_SALIENTE_CARGO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OFICIO_SALIENTE_CARGO1_idx] ON [dbo].[oficio_saliente]
(
	[Usuario_Cargo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OFICIO_SALIENTE_CORRESPONDENCIA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OFICIO_SALIENTE_CORRESPONDENCIA1_idx] ON [dbo].[oficio_saliente]
(
	[Correspondencia_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OFICIO_SALIENTE_DEPENDENCIA_AREA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OFICIO_SALIENTE_DEPENDENCIA_AREA1_idx] ON [dbo].[oficio_saliente]
(
	[AreaDestinada] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OFICIO_SALIENTE_DEPENDENCIA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OFICIO_SALIENTE_DEPENDENCIA1_idx] ON [dbo].[oficio_saliente]
(
	[Dependencia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OFICIO_SALIENTE_ENTIDAD_EXTERNA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OFICIO_SALIENTE_ENTIDAD_EXTERNA1_idx] ON [dbo].[oficio_saliente]
(
	[Destinatario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_OFICIO_SALIENTE_USUARIO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_OFICIO_SALIENTE_USUARIO1_idx] ON [dbo].[oficio_saliente]
(
	[Usuario_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_ORGANIGRAMA_USUARIO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_ORGANIGRAMA_USUARIO1_idx] ON [dbo].[organigrama]
(
	[EditadoPor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_SECCIONES_USUARIO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_SECCIONES_USUARIO1_idx] ON [dbo].[secciones]
(
	[CreadoPor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_SECCIONES_USUARIO2_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_SECCIONES_USUARIO2_idx] ON [dbo].[secciones]
(
	[EditadoPor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_SUBAREA_AREA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_SUBAREA_AREA1_idx] ON [dbo].[subarea]
(
	[Area_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_SUBAREA_OBJETIVO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_SUBAREA_OBJETIVO1_idx] ON [dbo].[subarea]
(
	[Objetivo_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_SUBAREA_ORGANIGRAMA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_SUBAREA_ORGANIGRAMA1_idx] ON [dbo].[subarea]
(
	[Organigrama_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_USUARIO_AREA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_USUARIO_AREA1_idx] ON [dbo].[usuario]
(
	[Area_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_USUARIO_CARGO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_USUARIO_CARGO1_idx] ON [dbo].[usuario]
(
	[Cargo_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_USUARIO_GRADO_ACADEMICO1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_USUARIO_GRADO_ACADEMICO1_idx] ON [dbo].[usuario]
(
	[GradoAcademico] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_USUARIO_ROL1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_USUARIO_ROL1_idx] ON [dbo].[usuario]
(
	[Rol_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_USUARIO_SUBAREA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_USUARIO_SUBAREA1_idx] ON [dbo].[usuario]
(
	[SubArea_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_USUARIO_TURNA_CORRESPONDENCIA_CORRESPONDENCIA1_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_USUARIO_TURNA_CORRESPONDENCIA_CORRESPONDENCIA1_idx] ON [dbo].[usuario_turna_correspondencia]
(
	[Correspondencia_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_USUARIO_TURNA_CORRESPONDENCIA_USUARIO1]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_USUARIO_TURNA_CORRESPONDENCIA_USUARIO1] ON [dbo].[usuario_turna_correspondencia]
(
	[Usuario_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [fk_USUARIO_TURNA_CORRESPONDENCIA_USUARIO2_idx]    Script Date: 04/02/2016 01:05:28 a. m. ******/
CREATE NONCLUSTERED INDEX [fk_USUARIO_TURNA_CORRESPONDENCIA_USUARIO2_idx] ON [dbo].[usuario_turna_correspondencia]
(
	[UTC_TurnarA_Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
ALTER TABLE [dbo].[anexo] ADD  DEFAULT (NULL) FOR [Anexo]
GO
ALTER TABLE [dbo].[area] ADD  DEFAULT (NULL) FOR [Objetivo_Id]
GO
ALTER TABLE [dbo].[area] ADD  DEFAULT (NULL) FOR [Organigrama_Id]
GO
ALTER TABLE [dbo].[area_tiene_secciones] ADD  DEFAULT (NULL) FOR [Area_Id]
GO
ALTER TABLE [dbo].[area_tiene_secciones] ADD  DEFAULT (NULL) FOR [Secciones_Id]
GO
ALTER TABLE [dbo].[area_tiene_secciones] ADD  DEFAULT (NULL) FOR [TipoDeContenido_Id]
GO
ALTER TABLE [dbo].[area_tiene_secciones] ADD  DEFAULT (NULL) FOR [FechaCreacion]
GO
ALTER TABLE [dbo].[area_tiene_secciones] ADD  DEFAULT (NULL) FOR [FechaEdicion]
GO
ALTER TABLE [dbo].[area_tiene_secciones] ADD  DEFAULT (NULL) FOR [Precedencia]
GO
ALTER TABLE [dbo].[area_tiene_secciones] ADD  DEFAULT (NULL) FOR [CreadoPor]
GO
ALTER TABLE [dbo].[area_tiene_secciones] ADD  DEFAULT (NULL) FOR [EditadoPor]
GO
ALTER TABLE [dbo].[caracter] ADD  DEFAULT (NULL) FOR [NombreCaracter]
GO
ALTER TABLE [dbo].[cargo] ADD  DEFAULT (NULL) FOR [DescripcionCargo]
GO
ALTER TABLE [dbo].[cargo_entidad] ADD  DEFAULT (NULL) FOR [NombreCargoEntidad]
GO
ALTER TABLE [dbo].[contenido] ADD  DEFAULT (NULL) FOR [NombreODescripcion]
GO
ALTER TABLE [dbo].[contenido] ADD  DEFAULT (NULL) FOR [AccionesOMetas]
GO
ALTER TABLE [dbo].[contenido] ADD  DEFAULT (NULL) FOR [FechaCreacion]
GO
ALTER TABLE [dbo].[contenido] ADD  DEFAULT (NULL) FOR [FechaEdicion]
GO
ALTER TABLE [dbo].[contenido] ADD  DEFAULT (NULL) FOR [ATS_Id]
GO
ALTER TABLE [dbo].[contenido] ADD  DEFAULT (NULL) FOR [CreadoPor]
GO
ALTER TABLE [dbo].[contenido] ADD  DEFAULT (NULL) FOR [EditadoPor]
GO
ALTER TABLE [dbo].[contenido] ADD  DEFAULT (NULL) FOR [ExtensionDoc]
GO
ALTER TABLE [dbo].[correspondencia] ADD  DEFAULT (NULL) FOR [FechaEmision]
GO
ALTER TABLE [dbo].[correspondencia] ADD  DEFAULT (NULL) FOR [FechaEntrega]
GO
ALTER TABLE [dbo].[correspondencia] ADD  DEFAULT (NULL) FOR [Asunto]
GO
ALTER TABLE [dbo].[correspondencia] ADD  DEFAULT (NULL) FOR [RequiereRespuesta]
GO
ALTER TABLE [dbo].[correspondencia] ADD  DEFAULT (NULL) FOR [URLPDF]
GO
ALTER TABLE [dbo].[correspondencia] ADD  DEFAULT (NULL) FOR [FechaLimiteR]
GO
ALTER TABLE [dbo].[correspondencia] ADD  DEFAULT (NULL) FOR [EnRespuestaA]
GO
ALTER TABLE [dbo].[correspondencia] ADD  DEFAULT (NULL) FOR [Estatus_Id]
GO
ALTER TABLE [dbo].[correspondencia] ADD  DEFAULT (NULL) FOR [Prioridad_Id]
GO
ALTER TABLE [dbo].[correspondencia] ADD  DEFAULT (NULL) FOR [Caracter_Id]
GO
ALTER TABLE [dbo].[datos_confidenciales] ADD  DEFAULT (NULL) FOR [Dato]
GO
ALTER TABLE [dbo].[dependencia] ADD  DEFAULT (NULL) FOR [AcronimoDependencia]
GO
ALTER TABLE [dbo].[dependencia_area] ADD  DEFAULT (NULL) FOR [NombreDependenciaArea]
GO
ALTER TABLE [dbo].[dependencia_tiene_area] ADD  DEFAULT (NULL) FOR [Dependencia_Id]
GO
ALTER TABLE [dbo].[dependencia_tiene_area] ADD  DEFAULT (NULL) FOR [DepArea_Id]
GO
ALTER TABLE [dbo].[descripcion] ADD  DEFAULT (NULL) FOR [Secciones_Id]
GO
ALTER TABLE [dbo].[descripcion] ADD  DEFAULT (NULL) FOR [SecDeArea]
GO
ALTER TABLE [dbo].[descripcion] ADD  DEFAULT (NULL) FOR [Descripcion]
GO
ALTER TABLE [dbo].[descripcion] ADD  DEFAULT (NULL) FOR [FechaCreacion]
GO
ALTER TABLE [dbo].[descripcion] ADD  DEFAULT (NULL) FOR [FechaEdicion]
GO
ALTER TABLE [dbo].[descripcion] ADD  DEFAULT (NULL) FOR [CreadoPor]
GO
ALTER TABLE [dbo].[descripcion] ADD  DEFAULT (NULL) FOR [EditadoPor]
GO
ALTER TABLE [dbo].[entidad_externa] ADD  DEFAULT (NULL) FOR [GradoAcademico]
GO
ALTER TABLE [dbo].[entidad_externa] ADD  DEFAULT (NULL) FOR [NombreEntidad]
GO
ALTER TABLE [dbo].[entidad_externa] ADD  DEFAULT (NULL) FOR [ApPaternoEntidad]
GO
ALTER TABLE [dbo].[entidad_externa] ADD  DEFAULT (NULL) FOR [ApMaternoEntidad]
GO
ALTER TABLE [dbo].[entidad_externa] ADD  DEFAULT (NULL) FOR [DepArea_Cargo_Id]
GO
ALTER TABLE [dbo].[entidad_externa] ADD  DEFAULT (NULL) FOR [Dependencia_Area_Id]
GO
ALTER TABLE [dbo].[estatus_ccp] ADD  DEFAULT (NULL) FOR [NombreEstatusCPP]
GO
ALTER TABLE [dbo].[grado_academico] ADD  DEFAULT (NULL) FOR [NombreGrado]
GO
ALTER TABLE [dbo].[grado_academico] ADD  DEFAULT (NULL) FOR [Abreviatura]
GO
ALTER TABLE [dbo].[memorandum] ADD  DEFAULT (NULL) FOR [Usuario_Cargo]
GO
ALTER TABLE [dbo].[memorandum] ADD  DEFAULT (NULL) FOR [Usuaerio_Area]
GO
ALTER TABLE [dbo].[objetivo] ADD  DEFAULT (NULL) FOR [Objetivo]
GO
ALTER TABLE [dbo].[objetivo] ADD  DEFAULT (NULL) FOR [FechaEdicion]
GO
ALTER TABLE [dbo].[objetivo] ADD  DEFAULT (NULL) FOR [EditadoPor]
GO
ALTER TABLE [dbo].[observaciones] ADD  DEFAULT (NULL) FOR [Oficio_Saliente_Id]
GO
ALTER TABLE [dbo].[observaciones] ADD  DEFAULT (NULL) FOR [DescripcionObservaciones]
GO
ALTER TABLE [dbo].[observaciones] ADD  DEFAULT (NULL) FOR [VistoBueno]
GO
ALTER TABLE [dbo].[observaciones] ADD  DEFAULT (NULL) FOR [Observacion_Usuario_Id]
GO
ALTER TABLE [dbo].[oficio_entrante] ADD  DEFAULT (NULL) FOR [IdOficioDependencia]
GO
ALTER TABLE [dbo].[oficio_entrante] ADD  DEFAULT (NULL) FOR [CargoDirigidoA_Id]
GO
ALTER TABLE [dbo].[oficio_entrante] ADD  DEFAULT (NULL) FOR [AreaRecibe_Id]
GO
ALTER TABLE [dbo].[oficio_entrante] ADD  DEFAULT (NULL) FOR [Correspondencia_Id]
GO
ALTER TABLE [dbo].[oficio_saliente] ADD  DEFAULT (NULL) FOR [Usuario_Cargo]
GO
ALTER TABLE [dbo].[oficio_saliente] ADD  DEFAULT (NULL) FOR [Usuario_Area]
GO
ALTER TABLE [dbo].[oficio_saliente] ADD  DEFAULT (NULL) FOR [URLAcuse]
GO
ALTER TABLE [dbo].[oficio_saliente] ADD  DEFAULT (NULL) FOR [FechaAcuse]
GO
ALTER TABLE [dbo].[organigrama] ADD  DEFAULT (NULL) FOR [OrganigramaURL]
GO
ALTER TABLE [dbo].[organigrama] ADD  DEFAULT (NULL) FOR [FechaEdicion]
GO
ALTER TABLE [dbo].[organigrama] ADD  DEFAULT (NULL) FOR [EditadoPor]
GO
ALTER TABLE [dbo].[rol] ADD  DEFAULT (NULL) FOR [DescripcionRol]
GO
ALTER TABLE [dbo].[secciones] ADD  DEFAULT (NULL) FOR [NombreSeccion]
GO
ALTER TABLE [dbo].[secciones] ADD  DEFAULT (NULL) FOR [FechaCreacion]
GO
ALTER TABLE [dbo].[secciones] ADD  DEFAULT (NULL) FOR [FechaEdicion]
GO
ALTER TABLE [dbo].[secciones] ADD  DEFAULT (NULL) FOR [CreadoPor]
GO
ALTER TABLE [dbo].[secciones] ADD  DEFAULT (NULL) FOR [EditadoPor]
GO
ALTER TABLE [dbo].[subarea] ADD  DEFAULT (NULL) FOR [NombreSubArea]
GO
ALTER TABLE [dbo].[subarea] ADD  DEFAULT (NULL) FOR [Objetivo_Id]
GO
ALTER TABLE [dbo].[subarea] ADD  DEFAULT (NULL) FOR [Organigrama_Id]
GO
ALTER TABLE [dbo].[subarea] ADD  DEFAULT (NULL) FOR [Area_Id]
GO
ALTER TABLE [dbo].[usuario] ADD  DEFAULT (NULL) FOR [GradoAcademico]
GO
ALTER TABLE [dbo].[usuario] ADD  DEFAULT (NULL) FOR [FechaInicio]
GO
ALTER TABLE [dbo].[usuario] ADD  DEFAULT (NULL) FOR [FechaFin]
GO
ALTER TABLE [dbo].[usuario] ADD  DEFAULT (NULL) FOR [URLCV]
GO
ALTER TABLE [dbo].[usuario] ADD  DEFAULT (NULL) FOR [Activo]
GO
ALTER TABLE [dbo].[usuario] ADD  DEFAULT (NULL) FOR [Rol_Id]
GO
ALTER TABLE [dbo].[usuario] ADD  DEFAULT (NULL) FOR [Area_Id]
GO
ALTER TABLE [dbo].[usuario] ADD  DEFAULT (NULL) FOR [SubArea_Id]
GO
ALTER TABLE [dbo].[usuario] ADD  DEFAULT (NULL) FOR [Cargo_Id]
GO
ALTER TABLE [dbo].[usuario] ADD  DEFAULT (NULL) FOR [updated_at]
GO
ALTER TABLE [dbo].[usuario] ADD  DEFAULT (NULL) FOR [created_at]
GO
ALTER TABLE [dbo].[usuario] ADD  DEFAULT (NULL) FOR [remember_token]
GO
ALTER TABLE [dbo].[usuario_turna_correspondencia] ADD  DEFAULT (NULL) FOR [Activo]
GO
ALTER TABLE [dbo].[anexo]  WITH CHECK ADD  CONSTRAINT [anexo$fk_ANEXO_CORRESPONDENCIA1] FOREIGN KEY([Correspondencia_Id])
REFERENCES [dbo].[correspondencia] ([IdCorrespondencia])
GO
ALTER TABLE [dbo].[anexo] CHECK CONSTRAINT [anexo$fk_ANEXO_CORRESPONDENCIA1]
GO
ALTER TABLE [dbo].[area]  WITH CHECK ADD  CONSTRAINT [area$fk_AREA_OBJETIVO1] FOREIGN KEY([Objetivo_Id])
REFERENCES [dbo].[objetivo] ([IdObjetivo])
GO
ALTER TABLE [dbo].[area] CHECK CONSTRAINT [area$fk_AREA_OBJETIVO1]
GO
ALTER TABLE [dbo].[area]  WITH CHECK ADD  CONSTRAINT [area$fk_AREA_ORGANIGRAMA1] FOREIGN KEY([Organigrama_Id])
REFERENCES [dbo].[organigrama] ([IdOrganigrama])
GO
ALTER TABLE [dbo].[area] CHECK CONSTRAINT [area$fk_AREA_ORGANIGRAMA1]
GO
ALTER TABLE [dbo].[area_tiene_secciones]  WITH CHECK ADD  CONSTRAINT [area_tiene_secciones$fk_AREA_TIENE_SECCIONES_AREA1] FOREIGN KEY([Area_Id])
REFERENCES [dbo].[area] ([IdArea])
GO
ALTER TABLE [dbo].[area_tiene_secciones] CHECK CONSTRAINT [area_tiene_secciones$fk_AREA_TIENE_SECCIONES_AREA1]
GO
ALTER TABLE [dbo].[area_tiene_secciones]  WITH CHECK ADD  CONSTRAINT [area_tiene_secciones$fk_AREA_TIENE_SECCIONES_SECCIONES1] FOREIGN KEY([Secciones_Id])
REFERENCES [dbo].[secciones] ([IdSeccion])
GO
ALTER TABLE [dbo].[area_tiene_secciones] CHECK CONSTRAINT [area_tiene_secciones$fk_AREA_TIENE_SECCIONES_SECCIONES1]
GO
ALTER TABLE [dbo].[area_tiene_secciones]  WITH CHECK ADD  CONSTRAINT [area_tiene_secciones$fk_AREA_TIENE_SECCIONES_TipoDeContenido1] FOREIGN KEY([TipoDeContenido_Id])
REFERENCES [dbo].[tipodecontenido] ([IdTipoDeContenido])
GO
ALTER TABLE [dbo].[area_tiene_secciones] CHECK CONSTRAINT [area_tiene_secciones$fk_AREA_TIENE_SECCIONES_TipoDeContenido1]
GO
ALTER TABLE [dbo].[area_tiene_secciones]  WITH CHECK ADD  CONSTRAINT [area_tiene_secciones$fk_AREA_TIENE_SECCIONES_USUARIO1] FOREIGN KEY([CreadoPor])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[area_tiene_secciones] CHECK CONSTRAINT [area_tiene_secciones$fk_AREA_TIENE_SECCIONES_USUARIO1]
GO
ALTER TABLE [dbo].[area_tiene_secciones]  WITH CHECK ADD  CONSTRAINT [area_tiene_secciones$fk_AREA_TIENE_SECCIONES_USUARIO2] FOREIGN KEY([EditadoPor])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[area_tiene_secciones] CHECK CONSTRAINT [area_tiene_secciones$fk_AREA_TIENE_SECCIONES_USUARIO2]
GO
ALTER TABLE [dbo].[ccopia_para]  WITH CHECK ADD  CONSTRAINT [ccopia_para$fk_CCOPIA_PARA_CORRESPONDENCIA1] FOREIGN KEY([Correspondencia_Id])
REFERENCES [dbo].[correspondencia] ([IdCorrespondencia])
GO
ALTER TABLE [dbo].[ccopia_para] CHECK CONSTRAINT [ccopia_para$fk_CCOPIA_PARA_CORRESPONDENCIA1]
GO
ALTER TABLE [dbo].[ccopia_para]  WITH CHECK ADD  CONSTRAINT [ccopia_para$fk_CCOPIA_PARA_ESTATUS_CCP1] FOREIGN KEY([EstatusCCP_Id])
REFERENCES [dbo].[estatus_ccp] ([IdEstatusCCP])
GO
ALTER TABLE [dbo].[ccopia_para] CHECK CONSTRAINT [ccopia_para$fk_CCOPIA_PARA_ESTATUS_CCP1]
GO
ALTER TABLE [dbo].[ccopia_para]  WITH CHECK ADD  CONSTRAINT [ccopia_para$fk_CCOPIA_PARA_USUARIO1] FOREIGN KEY([Usuario_Id])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[ccopia_para] CHECK CONSTRAINT [ccopia_para$fk_CCOPIA_PARA_USUARIO1]
GO
ALTER TABLE [dbo].[contenido]  WITH CHECK ADD  CONSTRAINT [contenido$fk_CONTENIDO_AREA_TIENE_SECCIONES1] FOREIGN KEY([ATS_Id])
REFERENCES [dbo].[area_tiene_secciones] ([IdATS])
GO
ALTER TABLE [dbo].[contenido] CHECK CONSTRAINT [contenido$fk_CONTENIDO_AREA_TIENE_SECCIONES1]
GO
ALTER TABLE [dbo].[contenido]  WITH CHECK ADD  CONSTRAINT [contenido$fk_CONTENIDO_USUARIO1] FOREIGN KEY([CreadoPor])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[contenido] CHECK CONSTRAINT [contenido$fk_CONTENIDO_USUARIO1]
GO
ALTER TABLE [dbo].[contenido]  WITH CHECK ADD  CONSTRAINT [contenido$fk_CONTENIDO_USUARIO2] FOREIGN KEY([EditadoPor])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[contenido] CHECK CONSTRAINT [contenido$fk_CONTENIDO_USUARIO2]
GO
ALTER TABLE [dbo].[correspondencia]  WITH CHECK ADD  CONSTRAINT [correspondencia$fk_CORRESPONDENCIA_CARACTER1] FOREIGN KEY([Caracter_Id])
REFERENCES [dbo].[caracter] ([IdCaracter])
GO
ALTER TABLE [dbo].[correspondencia] CHECK CONSTRAINT [correspondencia$fk_CORRESPONDENCIA_CARACTER1]
GO
ALTER TABLE [dbo].[correspondencia]  WITH CHECK ADD  CONSTRAINT [correspondencia$fk_CORRESPONDENCIA_CORRESPONDENCIA1] FOREIGN KEY([EnRespuestaA])
REFERENCES [dbo].[correspondencia] ([IdCorrespondencia])
GO
ALTER TABLE [dbo].[correspondencia] CHECK CONSTRAINT [correspondencia$fk_CORRESPONDENCIA_CORRESPONDENCIA1]
GO
ALTER TABLE [dbo].[correspondencia]  WITH CHECK ADD  CONSTRAINT [correspondencia$fk_CORRESPONDENCIA_Estatus1] FOREIGN KEY([Estatus_Id])
REFERENCES [dbo].[estatus] ([IdEstatus])
GO
ALTER TABLE [dbo].[correspondencia] CHECK CONSTRAINT [correspondencia$fk_CORRESPONDENCIA_Estatus1]
GO
ALTER TABLE [dbo].[correspondencia]  WITH CHECK ADD  CONSTRAINT [correspondencia$fk_CORRESPONDENCIA_PRIORIDAD1] FOREIGN KEY([Prioridad_Id])
REFERENCES [dbo].[prioridad] ([IdPrioridad])
GO
ALTER TABLE [dbo].[correspondencia] CHECK CONSTRAINT [correspondencia$fk_CORRESPONDENCIA_PRIORIDAD1]
GO
ALTER TABLE [dbo].[datos_confidenciales]  WITH CHECK ADD  CONSTRAINT [datos_confidenciales$fk_DATOS_CONFIDENCIALES_CORRESPONDENCIA1] FOREIGN KEY([Correspondencia_Id])
REFERENCES [dbo].[correspondencia] ([IdCorrespondencia])
GO
ALTER TABLE [dbo].[datos_confidenciales] CHECK CONSTRAINT [datos_confidenciales$fk_DATOS_CONFIDENCIALES_CORRESPONDENCIA1]
GO
ALTER TABLE [dbo].[dependencia_tiene_area]  WITH CHECK ADD  CONSTRAINT [dependencia_tiene_area$fk_DEPENDENCIA_TIENE_AREA_DEPENDENCIA_AREA1] FOREIGN KEY([DepArea_Id])
REFERENCES [dbo].[dependencia_area] ([IdDependenciaArea])
GO
ALTER TABLE [dbo].[dependencia_tiene_area] CHECK CONSTRAINT [dependencia_tiene_area$fk_DEPENDENCIA_TIENE_AREA_DEPENDENCIA_AREA1]
GO
ALTER TABLE [dbo].[dependencia_tiene_area]  WITH CHECK ADD  CONSTRAINT [dependencia_tiene_area$fk_DEPENDENCIA_TIENE_AREA_DEPENDENCIA1] FOREIGN KEY([Dependencia_Id])
REFERENCES [dbo].[dependencia] ([IdDependencia])
GO
ALTER TABLE [dbo].[dependencia_tiene_area] CHECK CONSTRAINT [dependencia_tiene_area$fk_DEPENDENCIA_TIENE_AREA_DEPENDENCIA1]
GO
ALTER TABLE [dbo].[descripcion]  WITH CHECK ADD  CONSTRAINT [descripcion$fk_DESCRIPCION_AREA1] FOREIGN KEY([SecDeArea])
REFERENCES [dbo].[area] ([IdArea])
GO
ALTER TABLE [dbo].[descripcion] CHECK CONSTRAINT [descripcion$fk_DESCRIPCION_AREA1]
GO
ALTER TABLE [dbo].[descripcion]  WITH CHECK ADD  CONSTRAINT [descripcion$fk_DESCRIPCION_SECCIONES1] FOREIGN KEY([Secciones_Id])
REFERENCES [dbo].[secciones] ([IdSeccion])
GO
ALTER TABLE [dbo].[descripcion] CHECK CONSTRAINT [descripcion$fk_DESCRIPCION_SECCIONES1]
GO
ALTER TABLE [dbo].[descripcion]  WITH CHECK ADD  CONSTRAINT [descripcion$fk_DESCRIPCION_USUARIO1] FOREIGN KEY([CreadoPor])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[descripcion] CHECK CONSTRAINT [descripcion$fk_DESCRIPCION_USUARIO1]
GO
ALTER TABLE [dbo].[descripcion]  WITH CHECK ADD  CONSTRAINT [descripcion$fk_DESCRIPCION_USUARIO2] FOREIGN KEY([EditadoPor])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[descripcion] CHECK CONSTRAINT [descripcion$fk_DESCRIPCION_USUARIO2]
GO
ALTER TABLE [dbo].[entidad_externa]  WITH CHECK ADD  CONSTRAINT [entidad_externa$fk_ENTIDAD_EXTERNA_DEPAREA_CARGO1] FOREIGN KEY([DepArea_Cargo_Id])
REFERENCES [dbo].[cargo_entidad] ([IdCargoEntidad])
GO
ALTER TABLE [dbo].[entidad_externa] CHECK CONSTRAINT [entidad_externa$fk_ENTIDAD_EXTERNA_DEPAREA_CARGO1]
GO
ALTER TABLE [dbo].[entidad_externa]  WITH CHECK ADD  CONSTRAINT [entidad_externa$fk_ENTIDAD_EXTERNA_DEPENDENCIA_TIENE_AREA1] FOREIGN KEY([Dependencia_Area_Id])
REFERENCES [dbo].[dependencia_tiene_area] ([IdDependenciaTieneArea])
GO
ALTER TABLE [dbo].[entidad_externa] CHECK CONSTRAINT [entidad_externa$fk_ENTIDAD_EXTERNA_DEPENDENCIA_TIENE_AREA1]
GO
ALTER TABLE [dbo].[memorandum]  WITH CHECK ADD  CONSTRAINT [memorandum$fk_MEMORANDUM_AREA1] FOREIGN KEY([Usuaerio_Area])
REFERENCES [dbo].[area] ([IdArea])
GO
ALTER TABLE [dbo].[memorandum] CHECK CONSTRAINT [memorandum$fk_MEMORANDUM_AREA1]
GO
ALTER TABLE [dbo].[memorandum]  WITH CHECK ADD  CONSTRAINT [memorandum$fk_MEMORANDUM_CARGO1] FOREIGN KEY([Usuario_Cargo])
REFERENCES [dbo].[cargo] ([IdCargo])
GO
ALTER TABLE [dbo].[memorandum] CHECK CONSTRAINT [memorandum$fk_MEMORANDUM_CARGO1]
GO
ALTER TABLE [dbo].[memorandum]  WITH CHECK ADD  CONSTRAINT [memorandum$fk_MEMORANDUM_CORRESPONDENCIA1] FOREIGN KEY([Correspondencia_Id])
REFERENCES [dbo].[correspondencia] ([IdCorrespondencia])
GO
ALTER TABLE [dbo].[memorandum] CHECK CONSTRAINT [memorandum$fk_MEMORANDUM_CORRESPONDENCIA1]
GO
ALTER TABLE [dbo].[memorandum]  WITH CHECK ADD  CONSTRAINT [memorandum$fk_MEMORANDUM_USUARIO1] FOREIGN KEY([Usuario_Id])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[memorandum] CHECK CONSTRAINT [memorandum$fk_MEMORANDUM_USUARIO1]
GO
ALTER TABLE [dbo].[objetivo]  WITH CHECK ADD  CONSTRAINT [objetivo$fk_OBJETIVO_USUARIO1] FOREIGN KEY([EditadoPor])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[objetivo] CHECK CONSTRAINT [objetivo$fk_OBJETIVO_USUARIO1]
GO
ALTER TABLE [dbo].[observaciones]  WITH CHECK ADD  CONSTRAINT [observaciones$fk_OBSERVACIONES_OFICIO_SALIENTE1] FOREIGN KEY([Oficio_Saliente_Id])
REFERENCES [dbo].[oficio_saliente] ([IdConsecutivo])
GO
ALTER TABLE [dbo].[observaciones] CHECK CONSTRAINT [observaciones$fk_OBSERVACIONES_OFICIO_SALIENTE1]
GO
ALTER TABLE [dbo].[observaciones]  WITH CHECK ADD  CONSTRAINT [observaciones$fk_OBSERVACIONES_USUARIO1] FOREIGN KEY([Observacion_Usuario_Id])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[observaciones] CHECK CONSTRAINT [observaciones$fk_OBSERVACIONES_USUARIO1]
GO
ALTER TABLE [dbo].[oficio_entrante]  WITH CHECK ADD  CONSTRAINT [oficio_entrante$fk_OFICIO_ENTRANTE_AREA1] FOREIGN KEY([AreaRecibe_Id])
REFERENCES [dbo].[area] ([IdArea])
GO
ALTER TABLE [dbo].[oficio_entrante] CHECK CONSTRAINT [oficio_entrante$fk_OFICIO_ENTRANTE_AREA1]
GO
ALTER TABLE [dbo].[oficio_entrante]  WITH CHECK ADD  CONSTRAINT [oficio_entrante$fk_OFICIO_ENTRANTE_CARGO_ENTIDAD1] FOREIGN KEY([CargoEmisor_Id])
REFERENCES [dbo].[cargo_entidad] ([IdCargoEntidad])
GO
ALTER TABLE [dbo].[oficio_entrante] CHECK CONSTRAINT [oficio_entrante$fk_OFICIO_ENTRANTE_CARGO_ENTIDAD1]
GO
ALTER TABLE [dbo].[oficio_entrante]  WITH CHECK ADD  CONSTRAINT [oficio_entrante$fk_OFICIO_ENTRANTE_CARGO1] FOREIGN KEY([CargoDirigidoA_Id])
REFERENCES [dbo].[cargo] ([IdCargo])
GO
ALTER TABLE [dbo].[oficio_entrante] CHECK CONSTRAINT [oficio_entrante$fk_OFICIO_ENTRANTE_CARGO1]
GO
ALTER TABLE [dbo].[oficio_entrante]  WITH CHECK ADD  CONSTRAINT [oficio_entrante$fk_OFICIO_ENTRANTE_DEPENDENCIA_AREA1] FOREIGN KEY([AreaEmite])
REFERENCES [dbo].[dependencia_area] ([IdDependenciaArea])
GO
ALTER TABLE [dbo].[oficio_entrante] CHECK CONSTRAINT [oficio_entrante$fk_OFICIO_ENTRANTE_DEPENDENCIA_AREA1]
GO
ALTER TABLE [dbo].[oficio_entrante]  WITH CHECK ADD  CONSTRAINT [oficio_entrante$fk_OFICIO_ENTRANTE_DEPENDENCIA1] FOREIGN KEY([DependenciaEmite])
REFERENCES [dbo].[dependencia] ([IdDependencia])
GO
ALTER TABLE [dbo].[oficio_entrante] CHECK CONSTRAINT [oficio_entrante$fk_OFICIO_ENTRANTE_DEPENDENCIA1]
GO
ALTER TABLE [dbo].[oficio_entrante]  WITH CHECK ADD  CONSTRAINT [oficio_entrante$fk_OFICIO_ENTRANTE_ENTIDAD_EXTERNA1] FOREIGN KEY([Emisor])
REFERENCES [dbo].[entidad_externa] ([IdEntidadExterna])
GO
ALTER TABLE [dbo].[oficio_entrante] CHECK CONSTRAINT [oficio_entrante$fk_OFICIO_ENTRANTE_ENTIDAD_EXTERNA1]
GO
ALTER TABLE [dbo].[oficio_entrante]  WITH CHECK ADD  CONSTRAINT [oficio_entrante$fk_OFICIO_ENTRANTE_USUARIO1] FOREIGN KEY([DirigidoA])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[oficio_entrante] CHECK CONSTRAINT [oficio_entrante$fk_OFICIO_ENTRANTE_USUARIO1]
GO
ALTER TABLE [dbo].[oficio_entrante]  WITH CHECK ADD  CONSTRAINT [oficio_entrante$fk_OFICIOENTRANTE_CORRESPONDENCIA1] FOREIGN KEY([Correspondencia_Id])
REFERENCES [dbo].[correspondencia] ([IdCorrespondencia])
GO
ALTER TABLE [dbo].[oficio_entrante] CHECK CONSTRAINT [oficio_entrante$fk_OFICIOENTRANTE_CORRESPONDENCIA1]
GO
ALTER TABLE [dbo].[oficio_saliente]  WITH CHECK ADD  CONSTRAINT [oficio_saliente$fk_OFICIO_SALIENTE_AREA1] FOREIGN KEY([Usuario_Area])
REFERENCES [dbo].[area] ([IdArea])
GO
ALTER TABLE [dbo].[oficio_saliente] CHECK CONSTRAINT [oficio_saliente$fk_OFICIO_SALIENTE_AREA1]
GO
ALTER TABLE [dbo].[oficio_saliente]  WITH CHECK ADD  CONSTRAINT [oficio_saliente$fk_OFICIO_SALIENTE_CARGO1] FOREIGN KEY([Usuario_Cargo])
REFERENCES [dbo].[cargo] ([IdCargo])
GO
ALTER TABLE [dbo].[oficio_saliente] CHECK CONSTRAINT [oficio_saliente$fk_OFICIO_SALIENTE_CARGO1]
GO
ALTER TABLE [dbo].[oficio_saliente]  WITH CHECK ADD  CONSTRAINT [oficio_saliente$fk_OFICIO_SALIENTE_CORRESPONDENCIA1] FOREIGN KEY([Correspondencia_Id])
REFERENCES [dbo].[correspondencia] ([IdCorrespondencia])
GO
ALTER TABLE [dbo].[oficio_saliente] CHECK CONSTRAINT [oficio_saliente$fk_OFICIO_SALIENTE_CORRESPONDENCIA1]
GO
ALTER TABLE [dbo].[oficio_saliente]  WITH CHECK ADD  CONSTRAINT [oficio_saliente$fk_OFICIO_SALIENTE_DEPENDENCIA_AREA1] FOREIGN KEY([AreaDestinada])
REFERENCES [dbo].[dependencia_area] ([IdDependenciaArea])
GO
ALTER TABLE [dbo].[oficio_saliente] CHECK CONSTRAINT [oficio_saliente$fk_OFICIO_SALIENTE_DEPENDENCIA_AREA1]
GO
ALTER TABLE [dbo].[oficio_saliente]  WITH CHECK ADD  CONSTRAINT [oficio_saliente$fk_OFICIO_SALIENTE_DEPENDENCIA1] FOREIGN KEY([Dependencia])
REFERENCES [dbo].[dependencia] ([IdDependencia])
GO
ALTER TABLE [dbo].[oficio_saliente] CHECK CONSTRAINT [oficio_saliente$fk_OFICIO_SALIENTE_DEPENDENCIA1]
GO
ALTER TABLE [dbo].[oficio_saliente]  WITH CHECK ADD  CONSTRAINT [oficio_saliente$fk_OFICIO_SALIENTE_ENTIDAD_EXTERNA1] FOREIGN KEY([Destinatario])
REFERENCES [dbo].[entidad_externa] ([IdEntidadExterna])
GO
ALTER TABLE [dbo].[oficio_saliente] CHECK CONSTRAINT [oficio_saliente$fk_OFICIO_SALIENTE_ENTIDAD_EXTERNA1]
GO
ALTER TABLE [dbo].[oficio_saliente]  WITH CHECK ADD  CONSTRAINT [oficio_saliente$fk_OFICIO_SALIENTE_USUARIO1] FOREIGN KEY([Usuario_Id])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[oficio_saliente] CHECK CONSTRAINT [oficio_saliente$fk_OFICIO_SALIENTE_USUARIO1]
GO
ALTER TABLE [dbo].[organigrama]  WITH CHECK ADD  CONSTRAINT [organigrama$fk_ORGANIGRAMA_USUARIO1] FOREIGN KEY([EditadoPor])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[organigrama] CHECK CONSTRAINT [organigrama$fk_ORGANIGRAMA_USUARIO1]
GO
ALTER TABLE [dbo].[secciones]  WITH CHECK ADD  CONSTRAINT [secciones$fk_SECCIONES_USUARIO1] FOREIGN KEY([CreadoPor])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[secciones] CHECK CONSTRAINT [secciones$fk_SECCIONES_USUARIO1]
GO
ALTER TABLE [dbo].[secciones]  WITH CHECK ADD  CONSTRAINT [secciones$fk_SECCIONES_USUARIO2] FOREIGN KEY([EditadoPor])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[secciones] CHECK CONSTRAINT [secciones$fk_SECCIONES_USUARIO2]
GO
ALTER TABLE [dbo].[subarea]  WITH CHECK ADD  CONSTRAINT [subarea$fk_SUBAREA_AREA1] FOREIGN KEY([Area_Id])
REFERENCES [dbo].[area] ([IdArea])
GO
ALTER TABLE [dbo].[subarea] CHECK CONSTRAINT [subarea$fk_SUBAREA_AREA1]
GO
ALTER TABLE [dbo].[subarea]  WITH CHECK ADD  CONSTRAINT [subarea$fk_SUBAREA_OBJETIVO1] FOREIGN KEY([Objetivo_Id])
REFERENCES [dbo].[objetivo] ([IdObjetivo])
GO
ALTER TABLE [dbo].[subarea] CHECK CONSTRAINT [subarea$fk_SUBAREA_OBJETIVO1]
GO
ALTER TABLE [dbo].[subarea]  WITH CHECK ADD  CONSTRAINT [subarea$fk_SUBAREA_ORGANIGRAMA1] FOREIGN KEY([Organigrama_Id])
REFERENCES [dbo].[organigrama] ([IdOrganigrama])
GO
ALTER TABLE [dbo].[subarea] CHECK CONSTRAINT [subarea$fk_SUBAREA_ORGANIGRAMA1]
GO
ALTER TABLE [dbo].[usuario]  WITH CHECK ADD  CONSTRAINT [usuario$fk_USUARIO_AREA1] FOREIGN KEY([Area_Id])
REFERENCES [dbo].[area] ([IdArea])
GO
ALTER TABLE [dbo].[usuario] CHECK CONSTRAINT [usuario$fk_USUARIO_AREA1]
GO
ALTER TABLE [dbo].[usuario]  WITH CHECK ADD  CONSTRAINT [usuario$fk_USUARIO_CARGO1] FOREIGN KEY([Cargo_Id])
REFERENCES [dbo].[cargo] ([IdCargo])
GO
ALTER TABLE [dbo].[usuario] CHECK CONSTRAINT [usuario$fk_USUARIO_CARGO1]
GO
ALTER TABLE [dbo].[usuario]  WITH CHECK ADD  CONSTRAINT [usuario$fk_USUARIO_GRADO_ACADEMICO1] FOREIGN KEY([GradoAcademico])
REFERENCES [dbo].[grado_academico] ([IdGrado])
GO
ALTER TABLE [dbo].[usuario] CHECK CONSTRAINT [usuario$fk_USUARIO_GRADO_ACADEMICO1]
GO
ALTER TABLE [dbo].[usuario]  WITH CHECK ADD  CONSTRAINT [usuario$fk_USUARIO_ROL1] FOREIGN KEY([Rol_Id])
REFERENCES [dbo].[rol] ([IdRol])
GO
ALTER TABLE [dbo].[usuario] CHECK CONSTRAINT [usuario$fk_USUARIO_ROL1]
GO
ALTER TABLE [dbo].[usuario]  WITH CHECK ADD  CONSTRAINT [usuario$fk_USUARIO_SUBAREA1] FOREIGN KEY([SubArea_Id])
REFERENCES [dbo].[subarea] ([IdSubArea])
GO
ALTER TABLE [dbo].[usuario] CHECK CONSTRAINT [usuario$fk_USUARIO_SUBAREA1]
GO
ALTER TABLE [dbo].[usuario_turna_correspondencia]  WITH CHECK ADD  CONSTRAINT [usuario_turna_correspondencia$fk_USUARIO_TURNA_CORRESPONDENCIA_CORRESPONDENCIA1] FOREIGN KEY([Correspondencia_Id])
REFERENCES [dbo].[correspondencia] ([IdCorrespondencia])
GO
ALTER TABLE [dbo].[usuario_turna_correspondencia] CHECK CONSTRAINT [usuario_turna_correspondencia$fk_USUARIO_TURNA_CORRESPONDENCIA_CORRESPONDENCIA1]
GO
ALTER TABLE [dbo].[usuario_turna_correspondencia]  WITH CHECK ADD  CONSTRAINT [usuario_turna_correspondencia$fk_USUARIO_TURNA_CORRESPONDENCIA_USUARIO1] FOREIGN KEY([Usuario_Id])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[usuario_turna_correspondencia] CHECK CONSTRAINT [usuario_turna_correspondencia$fk_USUARIO_TURNA_CORRESPONDENCIA_USUARIO1]
GO
ALTER TABLE [dbo].[usuario_turna_correspondencia]  WITH CHECK ADD  CONSTRAINT [usuario_turna_correspondencia$fk_USUARIO_TURNA_CORRESPONDENCIA_USUARIO2] FOREIGN KEY([UTC_TurnarA_Id])
REFERENCES [dbo].[usuario] ([IdUsuario])
GO
ALTER TABLE [dbo].[usuario_turna_correspondencia] CHECK CONSTRAINT [usuario_turna_correspondencia$fk_USUARIO_TURNA_CORRESPONDENCIA_USUARIO2]
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.anexo' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'anexo'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.`area`' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'area'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.area_tiene_secciones' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'area_tiene_secciones'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.caracter' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'caracter'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.cargo' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'cargo'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.cargo_entidad' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'cargo_entidad'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.ccopia_para' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'ccopia_para'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.contenido' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'contenido'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.correspondencia' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'correspondencia'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.datos_confidenciales' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'datos_confidenciales'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.dependencia' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'dependencia'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.dependencia_area' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'dependencia_area'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.dependencia_tiene_area' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'dependencia_tiene_area'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.descripcion' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'descripcion'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.entidad_externa' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'entidad_externa'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.estatus' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'estatus'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.estatus_ccp' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'estatus_ccp'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.grado_academico' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'grado_academico'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.memorandum' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'memorandum'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.objetivo' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'objetivo'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.observaciones' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'observaciones'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.oficio_entrante' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'oficio_entrante'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.oficio_saliente' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'oficio_saliente'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.organigrama' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'organigrama'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.prioridad' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'prioridad'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.rol' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'rol'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.secciones' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'secciones'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.subarea' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'subarea'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.tipodecontenido' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'tipodecontenido'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.usuario' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'usuario'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sisacmpl.usuario_turna_correspondencia' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'usuario_turna_correspondencia'
GO
USE [master]
GO
ALTER DATABASE [SISACMPL] SET  READ_WRITE 
GO
